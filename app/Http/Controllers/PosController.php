<?php

namespace App\Http\Controllers;


use App\Models\Customer\Customer;
use App\Models\Employee\Employee;
use App\Models\Pos\Pos;
use App\Models\Project\Location;
use App\Models\Stock\StockItems;
use App\Models\Stock\StockMovement;
use App\Models\Supplier\Supplier;
use App\Sales\SalesOrder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class PosController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('employee.auth:employee');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        if(Auth::guard('employee')->user()->location){
            $find  = Pos::with('stock')->where('location_id','=',Auth::guard('employee')->user()->location->id)->first();
            if($find){
                return view('pos.index');
            }
            return redirect(404);
        }
        return redirect(404);
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function login()
    {
        //
        return view('employee.auth.login');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getStock()
    {
        //
        $loc  = Location::where('ERP','=',4186)->first();
        $stock = StockItems::with('product.sales_price')->where('location_id','=',$loc->id)->get();
        if($stock){
            return response()->json($stock);
        }
        return redirect(404);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getSalesOrder()
    {
        //
        if(Auth::guard('employee')->user()->location){
            $stock = SalesOrder::with('customer','order_items.product','order_payment')->where('type','=','POS')->where('location_id','=',Auth::guard('employee')->user()->location->id)->get();
            if($stock){
                return response()->json(['status' => 'success','records' => $stock,'total'=>count($stock)]);
            }
        }
        return redirect(404);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function findSalesOrder($search)
    {
        //
        if(Auth::guard('employee')->user()->location){
            $stock = SalesOrder::with('customer','order_items','order_payment')->Find_By($search)->where('location_id','=',Auth::guard('employee')->user()->location->id)->get();
            if($stock){
                return response()->json(['status' => 'success','records' => $stock,'total'=>count($stock)]);
            }
        }
        return redirect(404);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function findCustomer($location,$search)
    {
        //
        $customers  = Customer::Find_By($search)->get();
        if ($customers){
            return response()->json(['status' => 'success','records' => $customers,'total' => count($customers)]);
        }
        return response()->json(['status' => 'errors','message' => 'No Records Found'],301);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function load()
    {
        //
        $supplier = Supplier::all();
        return response()->json(['status' => 'success','records' => $supplier,'total' => count($supplier) ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function post(Request $request,$location)
    {
        //
        $input = $request->all();
//        return response()->json(['status' => 'success','message' => $input]);
        if(empty($input['customer_id']) || !$input['customer_id']){
            $input['customer_id'] = 1;
        }
        $loc  = Location::where('ERP','=',$location)->first();
        $input['location_id'] = $loc->id;
        $rules = [
            'customer_id' => 'required',
            'location_id' => 'required',
            'total_amount' => 'required|between:0,99.99',
            'total_tax_amount' => 'required|between:0,99.99',
            'total_qty' => 'required|between:0,99.99',
            'total_discount_amount' => 'required|between:0,99.99',
            'total_items' => 'required|numeric',
            'total_balance' => 'required|numeric',
            'items.*' => 'required',
        ];
        $validator = Validator::make($input, $rules);
        if ($validator->fails()){
            return response()->json(['status' => 'errors','message' => $validator->errors()],301);
        }
        $last_order = DB::table('sales_orders')->latest('id')->first();
        $input['total_due'] = 0;
        if(!empty($input['payment'])){
            $reference = DB::table('sales_payments')->latest('id')->first();
            foreach ($input['payment'] as $key => $value){
                $input['payment'][$key]['customer_id'] = $input['customer_id'];
                $input['total_due'] +=  $input['payment'][$key]['amount'];
                $input['payment'][$key]['reference'] = 'POS_PYT_'.$reference->id++;
                $input['payment'][$key]['date'] = date('y/m/d');
                $input['payment'][$key]['status'] = 'COMPLETE';
            }
        }
        $input['outstanding_balance'] =  $input['total_balance'] - $input['total_due'];
        $input['type'] = 'POS_INVOICE';
        $input['issue_date'] = date('y/m/d');
        $input['expiry_date'] = date('y/m/d');
        $input['due_date'] = date('y/m/d');
        $input['reference'] = 'POS'.$input['location_id'].'L00000'.($last_order->id+1);
        $input['status'] = 'COMPLETE';
        $salesOrder  = SalesOrder::create($input);
        //create dir for order by  id
        $path = 'company/sales/pos/' . $salesOrder->id.'/';
        File::makeDirectory($path, 0777, true, true);
        if($input['items']){
            foreach ($input['items'] as $key => $value){
                $stock_items = new StockItems();
                $stock_movements = new StockMovement();
                $stock = $stock_items->where('product_id','=',$value['product_id'])->where('location_id','=',$input['location_id'])->first();
                if ($stock){
                    if($stock->quantity >= $value['quantity']){
                        // add stock movement
                        $stock_movements->product_id = $value['product_id'];
                        $stock_movements->reference = 'POS_SALES_'.$salesOrder->id;
                        $stock_movements->type = 'SALES';
                        $stock_movements->date =  date('y/m/d');
                        $stock_movements->quantity = $value['quantity'] <= 0 ? $value['quantity'] : -$value['quantity'];
                        $stock_movements->stock = $stock->quantity;
                        $stock_movements->save();
                        // minus stock qty
                        $stock->quantity = $stock->quantity - $value['quantity'];
                        $stock->save();

                        $input['items'][$key]['status'] = 'SOLD';
                        $input['items'][$key]['stock'] = $stock->quantity;
                        $input['items'][$key]['tax_value'] = ($value['price'] * $value['quantity']) * 0.05;
                        $input['items'][$key]['total'] = ($value['price'] * $value['quantity']) +  $input['items'][$key]['tax_value'];
                    }else{
                        $salesOrder->delete();
                        return response()->json(['status' => 'error','errors' => 'This Product Has Over QTY !'],302);
                        break;
                    }
                }else{
                    $salesOrder->delete();
                    return response()->json(['status' => 'error','errors' => 'This Product Has No Stock QTY !'],302);
                    break;
                }
            }
            $orderItems = $salesOrder->order_items()->createMany($input['items']);
        }
        if(!empty($input['payment'])){
            $orderPayment = $salesOrder->order_payment()->createMany($input['payment']);
        }
        if(!empty($input['shipping'])){
            $orderShipping = $salesOrder->order_shipping()->createMany($input['shipping']);
        }
        if(!empty($input['document'])){
            // store document and move it to purchase order dir into document folder
            foreach ($input['document'] as $key => $value){
                // Get image file
                $file = $request->file('document')[$key]['file'];
                // Make a image name based on user name and current timestamp
                $input['document'][$key]['name'] = $salesOrder->reference.'_'.$input['document'][$key]['name'].'_'.time();
                //
                $input['document'][$key]['file'] = $input['document'][$key]['name']. '.' . $file->getClientOriginalExtension();
                // Define folder path
                $folder = $path.'document/';
                // Upload image
                $upload = $file->move($folder,  $input['document'][$key]['file']);
            }
            $orderDocument = $salesOrder->order_document()->createMany($input['document']);
        }
        return response()->json(['status' => 'success', 'message' => 'success']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update($id,Request $request)
    {
        //
        $input = $request->all();
        $validatedData = $request->validate([
            'name' => 'required',
            'city' => 'required',
            'street' => 'required|string',
            'email' => 'required|string',
            'address_line1' => 'required|string',
            'address_line2' => 'required|string',
            'zip_code' => 'required|string',
            'phone' => 'required|string',
            'telephone' => 'required|string',
            'status' => 'required|string',
        ]);

        if (!$validatedData){
            return response()->json($validatedData->errors);
        }
        $supplier  = Supplier::findOrFail($id);
        $supplier->update($input);
        return response()->json(['status' => 'success','message'=> 'success'],200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

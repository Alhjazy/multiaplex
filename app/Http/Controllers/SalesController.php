<?php

namespace App\Http\Controllers;


use App\Models\Product\Product;
use App\Models\Purchase\PurchaseOrder;
use App\Models\Setting\Purchase\PurchaseSettings;
use App\Models\Stock\StockItems;
use App\Models\Stock\StockMovement;
use App\Sales\SalesOrder;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class SalesController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('sales.datagrid');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function sales_invoice()
    {
//        //
//        $pdf = PDF::loadView('sales.invoice');
//        return $pdf->download('invoice.pdf');
        return view('sales.invoice');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function order_dialog_view()
    {
        //
        return view('purchase.dialog');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

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
        $sales = SalesOrder::with('customer','location','employee')->get();
        return response()->json(['status' => 'success','records' => $sales,'total' => count($sales)]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function get_product_by_code($code,$location)
    {
        //
        $product = Product::with(['category','brand','sales_price','stock'=> function($q) use($location) {
            // Query the name field in status table
            $q->where('location_id', '=', $location); // '=' is optional
        }])->Find_By($code)->where('production','=','yes')->where('production','=','yes')->get();

        return response()->json(['status' => 'success' , 'records' => $product]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function get_by_id($id)
    {
        //
        $product = SalesOrder::with(['customer','location','employee','order_items.product','order_shipping','order_payment','order_document'])->FindOrFail($id);
        return response()->json(['status' => 'success' , 'records' => $product]);
    }
    public function purchase_load()
    {
        //
        $purchase = PurchaseOrder::with('supplier','location','employee')->where('type','=','PURCHASE')->get();
        return response()->json(['status' => 'success','records' => $purchase,'total' => count($purchase)]);
    }


    public function purchase_return_load()
    {
        //
        $purchase = PurchaseOrder::with('supplier','location')->where('type','=','RETURN_PURCHASE')->get();
        return response()->json(['status' => 'success','records' => $purchase,'total' => count($purchase)]);
    }
    public function sales_get_last_record()
    {
        //
        $purchase = DB::table('sales_orders')->latest('id')->first();
        return response()->json(['status' => 'success','records' => $purchase->id]);
    }
    public function sales_get_last_payment_record()
    {
        //
        $purchase = DB::table('sales_payments')->latest('id')->first();
        return response()->json(['status' => 'success','records' => $purchase->id]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $input = $request->all();
//        return response()->json(['status' => 'success','message' => $input]);
        $rules = [
            'customer_id' => 'required',
            'location_id' => 'required',
            'issue_date' => 'required|date',
            'expiry_date' => 'required|date',
            'total_amount' => 'required|between:0,99.99',
            'total_tax_amount' => 'required|between:0,99.99',
            'total_qty' => 'required|between:0,99.99',
            'total_discount_amount' => 'required|between:0,99.99',
            'total_items' => 'required|numeric',
            'total_balance' => 'required|numeric',
            'items.*' => 'required',
            'shipping.*' => 'required',
            'status' => 'required|string',
        ];
        $validator = Validator::make($input, $rules);
        if ($validator->fails()){
            return response()->json(['errors' => $validator->errors()]);
        }
        $last_order = DB::table('sales_orders')->latest('id')->first();
        $input['total_due'] = 0;
        if(!empty($input['payment'])){
            foreach ($input['payment'] as $key => $value){
                $input['payment'][$key]['customer_id'] = $input['customer_id'];
                $input['total_due'] +=  $input['payment'][$key]['amount'];
            }
        }
        $input['outstanding_balance'] =  $input['total_balance'] - $input['total_due'];
        if($input['outstanding_balance'] <= 0){
            $input['type'] = 'CASH_INVOICE';
        }else{
            $input['type'] = 'CREDIT_INVOICE';
        }
        $input['reference'] = $input['location_id'].'L00000'.($last_order->id+1);
        $salesOrder  = SalesOrder::create($input);
        //create dir for order by  id
        $path = 'company/sales/order/' . $salesOrder->id.'/';
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
                        $stock_movements->reference = 'SALES_ORDER_'.$salesOrder->id;
                        $stock_movements->type = 'SALES';
                        $stock_movements->date =  date('y/m/d');
                        $stock_movements->quantity = $value['quantity'] <= 0 ? $value['quantity'] : -$value['quantity'];
                        $stock_movements->stock = $stock->quantity;
                        $stock_movements->save();
                        // minus stock qty
                        $stock->quantity = $stock->quantity - $value['quantity'];
                        $stock->save();
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
        if(!empty($input['shipping'])){
            $orderShipping = $salesOrder->order_shipping()->createMany($input['shipping']);
        }
        if(!empty($input['payment'])){
            $orderPayment = $salesOrder->order_payment()->createMany($input['payment']);
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

    public function update(Request $request)
    {
        //
        $input = $request->all();
//        return response()->json(['status' => 'success','message' => $input]);
        $rules = [
            'customer_id' => 'required',
            'location_id' => 'required',
            'issue_date' => 'required|date',
            'expiry_date' => 'required|date',
            'total_amount' => 'required|between:0,99.99',
            'total_tax_amount' => 'required|between:0,99.99',
            'total_qty' => 'required|between:0,99.99',
            'total_discount_amount' => 'required|between:0,99.99',
            'total_items' => 'required|numeric',
            'total_balance' => 'required|numeric',
            'items.*' => 'required',
            'status' => 'required|string',
        ];

        $validator = Validator::make($input, $rules);
        if ($validator->fails()){
            return response()->json(['errors' => $validator->errors()]);
        }
        $salesOrder  = SalesOrder::with('order_items','order_shipping','order_payment','order_document')->findOrFail($input['id']);
//        $last_order = DB::table('sales_orders')->latest('id')->first();
        $input['total_due'] = 0;
        if(!empty($input['payment'])){
            foreach ($input['payment'] as $key => $value){
                $input['payment'][$key]['customer_id'] = $input['customer_id'];
                $input['total_due'] +=  $input['payment'][$key]['amount'];
            }
        }
        $input['outstanding_balance'] =  $input['total_balance'] - $input['total_due'];
        if($input['outstanding_balance'] <= 0){
            $input['type'] = 'CASH_INVOICE';
        }else{
            $input['type'] = 'CREDIT_INVOICE';
        }
        $input['reference'] = $input['location_id'].'L00000'.($salesOrder->id);
        $salesOrder->update($input);
        //create dir for order by  id
        $path = 'company/sales/order/' . $salesOrder->id.'/';
        File::makeDirectory($path, 0777, true, true);
        if($input['items']){
            foreach ($input['items'] as $key => $value){
                $stock_items = new StockItems();
                $stock_movements = new StockMovement();
                if(isset($input['items'][$key]['id'])){
                    $orderItems = $salesOrder->order_items()->where('id','=',$value['id'])->get();
                    if($orderItems){
                        $stock = $stock_items->where('product_id','=',$value['product_id'])->where('location_id','=',$input['location_id'])->first();
                        if ($stock){
                            // add stock ADJUTEMNT movement
                            $stock_movements->product_id = $value['product_id'];
                            $stock_movements->reference = 'SALES_ORDER_ADJUSTED_'.$salesOrder->id;
                            $stock_movements->type = 'SALES';
                            $stock_movements->date =  date('y/m/d');
                            $stock_movements->quantity = $orderItems[0]->quantity;
                            $stock_movements->stock = $stock->quantity;
                            $stock_movements->save();
                            // RETURN STOCK QTY
                            $stock->quantity = $stock->quantity + $orderItems[0]->quantity;
                            $stock->save();

                            if($stock->quantity >= $value['quantity']){
                                // add stock movement
                                $stock_movements->product_id = $value['product_id'];
                                $stock_movements->reference = 'SALES_ORDER_ADJUSTED_'.$salesOrder->id;
                                $stock_movements->type = 'SALES';
                                $stock_movements->date =  date('y/m/d');
                                $stock_movements->quantity = $value['quantity'] <= 0 ? $value['quantity'] : -$value['quantity'];
                                $stock_movements->stock = $stock->quantity;
                                $stock_movements->save();
                                // minus stock qty
                                $stock->quantity = $stock->quantity - $value['quantity'];
                                $stock->save();
                                $salesOrder->order_items()->update(array_except($value,['id']));
                            }else{
//                                $salesOrder->delete();
                                return response()->json(['status' => 'error','errors' => 'This Product Has Over QTY !'],302);
                                break;
                            }
                        }else{
//                            $salesOrder->delete();
                            return response()->json(['status' => 'error','errors' => 'This Product Has No Stock QTY !'],302);
                            break;
                        }
                    }
                }else{
                    $stock = $stock_items->where('product_id','=',$value['product_id'])->where('location_id','=',$input['location_id'])->first();
                    if ($stock){
                        if($stock->quantity >= $value['quantity']){
                            // add stock movement
                            $stock_movements->product_id = $value['product_id'];
                            $stock_movements->reference = 'SALES_ORDER_'.$salesOrder->id;
                            $stock_movements->type = 'SALES';
                            $stock_movements->date =  date('y/m/d');
                            $stock_movements->quantity = $value['quantity'] <= 0 ? $value['quantity'] : -$value['quantity'];
                            $stock_movements->stock = $stock->quantity;
                            $stock_movements->save();
                            // minus stock qty
                            $stock->quantity = $stock->quantity - $value['quantity'];
                            $stock->save();
                            $salesOrder->order_items()->create($value);
                        }else{
//                            $salesOrder->delete();
                            return response()->json(['status' => 'error','errors' => 'This Product Has Over QTY !'],302);
                            break;
                        }
                    }else{
//                        $salesOrder->delete();
                        return response()->json(['status' => 'error','errors' => 'This Product Has No Stock QTY !'],302);
                        break;
                    }
                }
            }
//            $orderItems = $salesOrder->order_items()->createMany($input['items']);
        }
        if(!empty($input['shipping'])){
            foreach ($input['shipping'] as $key => $value){
                if(isset($input['shipping'][$key]['id'])){
                    $orderItems = $salesOrder->order_shipping()->where('id','=',$value['id'])->get();
                    if($orderItems){
                        $salesOrder->order_shipping()->update(array_except($value,['id']));
                    }
                }else{
                    $salesOrder->order_shipping()->create($value);
                }
            }
        }
        if(!empty($input['payment'])){
            foreach ($input['payment'] as $key => $value){
                if(isset($input['payment'][$key]['id'])){
                    $orderItems = $salesOrder->order_payment()->where('id','=',$value['id'])->get();
                    if($orderItems){
                        $salesOrder->order_payment()->update(array_except($value,['id']));
                    }
                }else{
                    $salesOrder->order_payment()->create($value);
                }
            }
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
                $value['file'] =  $input['document'][$key]['file'];
                //update & delete the oldset
                if(isset($input['document'][$key]['id'])){
                    $orderItems = $salesOrder->order_document()->where('id','=',$value['id'])->get();
                    if($orderItems){
                        File::delete($folder.$orderItems[0]->file);
                        $salesOrder->order_document()->update(array_except($value,['id']));
                    }
                }else{
                    $salesOrder->order_document()->create($value);
                }
            }
        }
        return response()->json(['status' => 'success', 'message' => 'success']);
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

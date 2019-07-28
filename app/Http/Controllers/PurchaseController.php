<?php

namespace App\Http\Controllers;


use App\Models\Purchase\PurchaseOrder;
use App\Models\Setting\Purchase\PurchaseSettings;
use App\Models\Stock\StockItems;
use App\Models\Stock\StockMovement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class PurchaseController extends Controller
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
        return view('purchase.datagrid');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function datagrid()
    {
        //
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
        $purchase = PurchaseOrder::with('supplier','location')->get();
        return response()->json(['status' => 'success','records' => $purchase,'total' => count($purchase)]);
    }

    public function purchase_load()
    {
        //
        $purchase = PurchaseOrder::with('supplier','location')->where('type','=','PURCHASE')->get();
        return response()->json(['status' => 'success','records' => $purchase,'total' => count($purchase)]);
    }


    public function purchase_return_load()
    {
        //
        $purchase = PurchaseOrder::with('supplier','location')->where('type','=','RETURN-PURCHASE')->get();
        return response()->json(['status' => 'success','records' => $purchase,'total' => count($purchase)]);
    }
    public function purchase_get_last_record()
    {
        //
        $purchase = DB::table('purchase_orders')->latest('created_at')->first();
        return response()->json(['status' => 'success','records' => $purchase]);
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
            'supplier_id' => 'required',
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
            'payment.*' => 'required',
            'shipping.*' => 'required',
            'document.*' => 'required',
            'remark' => 'string',
            'description' => 'string',
            'state' => 'required|string',
        ];
        $validator = Validator::make($input, $rules);
        if ($validator->fails()){
            return response()->json(['errors' => $validator->errors()]);
        }

        $input['type'] = 'PURCHASE';
        $input['status'] = 'ACTIVE';
        foreach ($input['payment'] as $key => $value){
            $input['payment'][$key]['supplier_id'] = $input['supplier_id'];
            $input['total_due'] =+ $value['amount'];
        }
        $input['outstanding_balance'] =  $input['total_balance'] - $input['total_due'];
        $purchaseOrder  = PurchaseOrder::create($input);
        //create dir for order by  id
        $path = 'company/purchase/order/' . $purchaseOrder->id.'/';
        File::makeDirectory($path, 0777, true, true);
        $orderItems = $purchaseOrder->order_items()->createMany($input['items']);
        if($orderItems && $input['state'] === 'COMPLETE'){
            foreach ($orderItems as $key => $value){
                $stock_items = new StockItems();
                $stock_movements = new StockMovement();
                $stock = $stock_items->where('product_id','=',$value->product_id)->where('location_id','=',$input['location_id'])->firstOrFail();
                if (count($stock)){
                    // add stock movement
                    $stock_movements->product_id = $value->product_id;
                    $stock_movements->reference = $purchaseOrder->reference;
                    $stock_movements->type = $purchaseOrder->type;
                    $stock_movements->date =  date('y/m/d');
                    $stock_movements->quantity = $value->quantity;
                    $stock_movements->stock = $stock->quantity;
                    $stock_movements->save();
                    // add stock qty
                    $stock->quantity = $stock->quantity + $value->quantity;
                    $stock->save();
                }else{
                    // add stock movement
                    $stock_movements->product_id = $value->product_id;
                    $stock_movements->reference = $purchaseOrder->reference;
                    $stock_movements->type = $purchaseOrder->type;
                    $stock_movements->date = date('y/m/d');
                    $stock_movements->quantity = $value->quantity;
                    $stock_movements->stock = 0;
                    $stock_movements->save();
                    // add new stock item with qty
                    $stock_items->location_id = $input['location_id'];
                    $stock_items->product_id  = $value->product_id;
                    $stock_items->quantity    = $value->quantity;
                    $stock_items->save();
                }
            }
        }
        if(!empty($input['shipping'])){
            $orderShipping = $purchaseOrder->order_shipping()->createMany($input['shipping']);
        }
        if(!empty($input['payment'])){
            $orderPayment = $purchaseOrder->order_payment()->createMany($input['payment']);
        }
        if(!empty($input['document'])){
            // store document and move it to purchase order dir into document folder
            foreach ($input['document'] as $key => $value){
                // Get image file
                $file = $request->file('document')[$key]['file'];
                // Make a image name based on user name and current timestamp
                $input['document'][$key]['name'] = $purchaseOrder->reference.'_'.$input['document'][$key]['name'].'_'.time();
                //
                $input['document'][$key]['file'] = $input['document'][$key]['name']. '.' . $file->getClientOriginalExtension();
                // Define folder path
                $folder = $path.'document/';
                // Upload image
                $upload = $file->move($folder,  $input['document'][$key]['file']);
            }
            $orderDocument = $purchaseOrder->order_document()->createMany($input['document']);
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

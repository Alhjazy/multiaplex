<?php

namespace App\Http\Controllers;

use App\Models\Customer\Customer;
use App\Models\Supplier\Supplier;
use Illuminate\Http\Request;

class CustomerController extends Controller
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
        return view('customer.datagrid');
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
        $customer = Customer::all();
        return response()->json(['status' => 'success','records' => $customer,'total' => count($customer) ]);
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
        $supplier  = Supplier::create($input);
        return response()->json(['status' => 'success','message'=> 'success'],200);
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

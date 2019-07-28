<?php

namespace App\Http\Controllers;

use App\Employee;
use App\Models\Project\Branch;
use App\Models\Project\Location;
use App\Models\Supplier\Supplier;
use Dotenv\Validator;
use Illuminate\Http\Request;

class ProjectController extends Controller
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
        return view('project.dashboard');
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
    public function locations_view()
    {
        //
        return view('project.branches.datagrid');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function locations_load()
    {
        //
        $locations = Location::all();
        return response()->json(['status' => 'success', 'records' => $locations, 'total' => count($locations)]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function locations_store(Request $request)
    {
        //
        $input = $request->all();
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'telephone' => 'required|unique:branches,telephone|max:255',
            'email' => 'required|unique:branches,email',
            'city' => 'required|max:255',
            'street' => 'required',
            'address_line1' => 'required',
            'address_line2' => 'required|string',
            'zip_code' => 'required|string',
            'type' => 'required|string',
            'status' => 'required|string',
        ]);

        if (!$validatedData){
            return response()->json($validatedData->errors);
        }

        $branches  = new Branch();
        $branches->name     = $input['name'];
        $branches->telephone        = $input['telephone'];
        $branches->email        = $input['email'];
        $branches->city     = $input['city'];
        $branches->street    = $input['street'];
        $branches->address_line1      = $input['address_line1'];
        $branches->address_line2     = $input['address_line2'];
        $branches->zip_code       = $input['zip_code'];
        $branches->type       = $input['type'];
        $branches->status       = $input['status'];
        $branches->save();

        return response()->json($branches);
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

<?php

namespace App\Http\Controllers;

use App\Employee;
use Dotenv\Validator;
use Illuminate\Http\Request;

class HRMSController extends Controller
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
        return view('hrms.dashboard');
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
            'full_name' => 'required|string|max:255',
            'email' => 'required|unique:employees,email|max:255|email',
            'phone' => 'required|numeric|unique:employees,phone',
            'username' => 'required|max:255|unique:employees,username',
            'telephone' => 'required|unique:employees,telephone',
            'picture' => 'required',
            'password' => 'required|string|min:4',
            'status' => 'required|string',
        ]);

        if (!$validatedData){
            return response()->json($validatedData->errors);
        }

        $employee  = new Employee();
        $employee->full_name    = $input['full_name'];
        $employee->email        = $input['email'];
        $employee->phone        = $input['phone'];
        $employee->username     = $input['username'];
        $employee->telephone    = $input['telephone'];
        $employee->picture      = $input['picture'];
        $employee->password     = $input['password'];
        $employee->status       = $input['status'];
        $employee->save();

        return response()->json($employee);
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
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function load()
    {
        //
        $employee = Employee::all();
        return response()->json($employee);
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

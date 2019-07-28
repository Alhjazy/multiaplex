<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    protected $redirectTo = '/employee/login';

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
     * Show the Employee dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request) {
//        dd($request->getHost());
        return $request->getHost() === 'pos.multiplex.laravel' ? redirect('/') : view('employee.home');
    }

}
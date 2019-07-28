<?php

namespace App\Http\Controllers;

use App\Models\Employee\Rule;
use App\Models\Product\Brand;
use App\Models\Product\Category;
use App\Models\Setting\CompanySettings;
use App\Models\Setting\Purchase\PurchaseSettings;
use Illuminate\Http\Request;

class SettingsController extends Controller
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
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('settings.dashboard');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function general_settings_view()
    {
        return view('settings.general.dashboard');
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function company_settings_view()
    {
        $company  = CompanySettings::findOrFail(1);
        return view('settings.general.company.settings',compact('company'));
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function company_settings_update(Request $request)
    {
        $company  = CompanySettings::findOrFail(1);
        $input = $request->all();
        $path = 'company/';
        if($request->hasFile('logo')){
            // Get image file
            $file = $request->file('logo');
            // Make a image name based on user name and current timestamp
            $name = 'logo';
            //
            $filename = $name. '.' . $file->getClientOriginalExtension();
            // Upload image
            $upload = $file->move($path,  $filename);
            // update Picture name for employee record
            if ($upload){
                $input['logo'] = $filename;
                $company->update(['logo' => $filename]);
            }else{
                return response()->json(['status' => 'errors','message'=> $upload],301);
            }
        }
        if($request->hasFile('image_trade_license')){
            // Get image file
            $file = $request->file('image_trade_license');
            // Make a image name based on user name and current timestamp
            $name = 'image_trade_license';
            //
            $filename = $name. '.' . $file->getClientOriginalExtension();
            // Upload image
            $upload = $file->move($path,  $filename);
            // update Picture name for employee record
            if ($upload){
                $input['image_trade_license'] = $filename;
                $company->update(['image_trade_license' => $filename]);
            }else{
                return response()->json(['status' => 'errors','message'=> $upload],301);
            }
        }
        if($request->hasFile('image_1')){
            // Get image file
            $file = $request->file('image_1');
            // Make a image name based on user name and current timestamp
            $name = 'image_1';
            //
            $filename = $name. '.' . $file->getClientOriginalExtension();
            // Upload image
            $upload = $file->move($path,  $filename);
            // update Picture name for employee record
            if ($upload){
                $input['image_1'] = $filename;
                $company->update(['image_1' => $filename]);
            }else{
                return response()->json(['status' => 'errors','message'=> $upload],301);
            }
        }
        if($request->hasFile('image_2')){
            // Get image file
            $file = $request->file('image_2');
            // Make a image name based on user name and current timestamp
            $name = 'image_2';
            //
            $filename = $name. '.' . $file->getClientOriginalExtension();
            // Upload image
            $upload = $file->move($path,  $filename);
            // update Picture name for employee record
            if ($upload){
                $input['image_2'] = $filename;
                $company->update(['image_2' => $filename]);
            }else{
                return response()->json(['status' => 'errors','message'=> $upload],301);
            }
        }
        if($request->hasFile('image_3')){
            // Get image file
            $file = $request->file('image_3');
            // Make a image name based on user name and current timestamp
            $name = 'image_3';
            //
            $filename = $name. '.' . $file->getClientOriginalExtension();
            // Upload image
            $upload = $file->move($path,  $filename);
            // update Picture name for employee record
            if ($upload){
                $input['image_3'] = $filename;
                $company->update(['image_3' => $filename]);
            }else{
                return response()->json(['status' => 'errors','message'=> $upload],301);
            }
        }
        if($request->hasFile('image_4')){
            // Get image file
            $file = $request->file('image_4');
            // Make a image name based on user name and current timestamp
            $name = 'image_4';
            //
            $filename = $name. '.' . $file->getClientOriginalExtension();
            // Upload image
            $upload = $file->move($path,  $filename);
            // update Picture name for employee record
            if ($upload){
                $input['image_4'] = $filename;
                $company->update(['image_4' => $filename]);
            }else{
                return response()->json(['status' => 'errors','message'=> $upload],301);
            }
        }
        $company->update($input);
        return response()->json(['status' => 'success','message'=> $input],200);
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function purchase_settings_view()
    {
        $purchase  = PurchaseSettings::findOrFail(1);
        return view('settings.general.purchase.settings',compact('purchase'));
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function purchase_settings_update(Request $request)
    {
        $purchase  = PurchaseSettings::findOrFail(1);
        $purchase->update( $request->all());
        return response()->json(['status' => 'success','message'=> 'Success'],200);
    }
    public function purchase_settings_load()
    {
        $purchase  = PurchaseSettings::all();
        return response()->json(['status' => 'success','records'=> $purchase ,'total'=> count($purchase) ],200);
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function roles_view()
    {
        return view('settings.hrms.roles');
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function rules_load()
    {
        $rules = Rule::all();
        return response()->json($rules);
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function roles_store()
    {
        return view('settings.hrms.roles');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function category_view()
    {
        return view('settings.hrms.roles');
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function category_load()
    {
        $category = Category::select('id','name')->get();
        return response()->json(['status' => 'success','records' => $category]);
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function category_store()
    {
        return view('settings.hrms.roles');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function brand_view()
    {
        return view('settings.hrms.roles');
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function brand_load()
    {
        $brand = Brand::all();
        return response()->json(['status' => 'success','records' => $brand]);
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function brand_store()
    {
        return view('settings.hrms.roles');
    }
}

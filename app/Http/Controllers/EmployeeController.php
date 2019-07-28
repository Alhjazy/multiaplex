<?php

namespace App\Http\Controllers;


use App\Http\Requests\EmployeeRequest;
use App\Models\Employee\Document;
use App\Models\Employee\Employee;
use App\Models\Employee\EmployeeDocuments;
use App\Models\Employee\EmployeeExperiences;
use App\Models\Employee\EmployeeRules;
use App\Models\Employee\EmployeeSkills;
use App\Models\Employee\Experience;
use App\Models\Employee\Salary;
use App\Models\Employee\Skill;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class EmployeeController extends Controller
{

    protected $picture = null;
    protected $documents = [];
    protected $employee = null;
    protected $employeeID = null;
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
        return view('hrms.employee.datagrid');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function register()
    {
        //
        return view('hrms.employee.register');
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
        return response()->json(['status' => 'success','records' => $employee,'total' => count($employee) ]);
    }

    public function find($key){
        $employee = Employee::with('rule','documents','salary')->find($key);
        return response()->json($employee);
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
         $input =  $request->all();
        $rules = [
            'full_name'             => 'required|string|max:255',
            'email'                 => 'required|unique:employees,email|max:255|email',
            'phone'                 => 'required|numeric|unique:employees,phone',
            'username'              => 'required|max:255|unique:employees,username',
            'telephone'             => 'required|unique:employees,telephone',
            'password'              => 'required|string|min:4',
            'gender'                => 'required',
            'is_married'            => 'required',
            'age'                   => 'required',
            'birthday'              => 'required',
            'id_expiration_date'    => 'required',
            'is_citizen'            => 'required',
            'nationality'           => 'required',
            'number_id'             => 'required|unique:employees,number_id',
            'join_date'             => 'required',
            'status'                => 'required|string',
            'fixed_income'          => 'required',
            'basic'                 => 'required',
            'housing'               => 'required',
            'transport'             => 'required',
            'fuel'                  => 'required',
            'mobile'                => 'required',
            'rules_id.*'            => 'required',
            'documents_name.*'      => 'required|string',
            'documents_file.*'      => 'required',
        ];
        $validator = Validator::make($input,$rules);
        if ($validator->fails()){
            return response()->json(['status' => 'errors','message'=> $validator->errors()],301);
        }
        $input['birthday'] = date("Y-m-d", strtotime($request->input('birthday')));
        $input['join_date'] = date("Y-m-d", strtotime($request->input('join_date')));
        $input['id_expiration_date'] = date("Y-m-d", strtotime($request->input('id_expiration_date')));
        $employee  = Employee::create($input);
        $employee->salary()->create($input);
        //create dir for employee by id
        $path = 'employees/' . $employee->id.'/';
        File::makeDirectory($path, 0777, true, true);
        // store Picture for employee into profile folder
        if ($request->hasFile('picture')){

            // Get image file
            $file = $request->file('picture');
            // Make a image name based on user name and current timestamp
            $name = $employee->id.'_'.str_slug($employee->username).'_'.time();
            //
            $filename = $name. '.' . $file->getClientOriginalExtension();
            // Define folder path
            $folder = $path.'profile/';
            // Upload image
            $upload = $file->move($folder,  $filename);
            // update Picture name for employee record
            if ($upload){
                $employee->update(['picture' => $filename]);
            }else{
                return response()->json(['status' => 'errors','message'=> $upload],301);
            }
        }


        if ($input['rules_id']){
            // store rules
            foreach ($input['rules_id'] as $key => $value){
                $EMPRole = new EmployeeRules();
                $EMPRole->employee_id = $employee->id;
                $EMPRole->rule_id = intval($value);
                $EMPRole->status = 'ACTIVE';
                $EMPRole->save();
            }
        }
        // store documents and move it to employee dir into documents folder
        if ($input['document_file']){
            // Get image file
            $file = $request->file('document_file');
            foreach ($file as $key => $value){
                // Make a image name based on user name and current timestamp
                $name = $employee->id.'_'.str_slug($request->input('document_name')[$key]).'_'.time();
                //
                $filename = $name. '.' . $file[$key]->getClientOriginalExtension();
                // Define folder path
                $folder = $path.'documents/';
                // Upload image
                $upload = $file[$key]->move($folder,  $filename);
                // update Picture name for employee record
                if ($upload){
                    $doc = new Document();
                    $doc->name = $input['document_name'][$key];
                    $doc->file = $filename;
                    $doc->status = 'ACTIVE';
                    $doc->save();
                    $EMPDoc = new EmployeeDocuments();
                    $EMPDoc->employee_id = $employee->id;
                    $EMPDoc->document_id = $doc->id;
                    $EMPDoc->status = 'ACTIVE';
                    $EMPDoc->save();
                }else{
                    return response()->json(['errors',$upload]);
                }
            }

        }

        //
        return response()->json(['status' => 'success','message'=> 'success'],200);
    }

    public function update($id,Request $request)
    {
        //

        $input =  $request->all();
        $employee  = Employee::with('salary','rule','documents')->findOrFail($id);
        if(!$employee){
            return response()->json(['status' => 'errors','message'=> 'we cloud not found employee. '],404);
        }
        $employee->update($input);
        //create dir for employee by id
        $path = 'employees/' . $employee->id.'/';
        File::makeDirectory($path, 0777, true, true);
        // store Picture for employee into profile folder
        if ($request->hasFile('picture')){

            // Get image file
            $file = $request->file('picture');
            // Make a image name based on user name and current timestamp
            $name = $employee->id.'_'.str_slug($employee->username).'_'.time();
            //
            $filename = $name. '.' . $file->getClientOriginalExtension();
            // Define folder path
            $folder = $path.'profile/';
            // Upload image
            $upload = $file->move($folder,  $filename);
            // update Picture name for employee record
            if ($upload){
                $employee->update(['picture' => $filename]);
            }else{
                return response()->json(['status' => 'errors','message'=> $upload],301);
            }
        }
        if ($request->has('rules_id')){
            // store rules
            foreach ($input['rules_id'] as $key => $value){
                $EMPRole = new EmployeeRules();
                $EMPRole->employee_id = $employee->id;
                $EMPRole->rule_id = intval($value);
                $EMPRole->status = 'ACTIVE';
                $EMPRole->save();
            }
        }
        // store documents and move it to employee dir into documents folder
        if ($request->has('document_file')){
            // Get image file
            $file = $request->file('document_file');
            foreach ($file as $key => $value){
                // Make a image name based on user name and current timestamp
                $name = $employee->id.'_'.str_slug($request->input('document_name')[$key]).'_'.time();
                //
                $filename = $name. '.' . $file[$key]->getClientOriginalExtension();
                // Define folder path
                $folder = $path.'documents/';
                // Upload image
                $upload = $file[$key]->move($folder,  $filename);
                // update Picture name for employee record
                if ($upload){
                    $doc = new Document();
                    $doc->name = $input['document_name'][$key];
                    $doc->file = $filename;
                    $doc->status = 'ACTIVE';
                    $doc->save();
                    $EMPDoc = new EmployeeDocuments();
                    $EMPDoc->employee_id = $employee->id;
                    $EMPDoc->document_id = $doc->id;
                    $EMPDoc->status = 'ACTIVE';
                    $EMPDoc->save();
                }else{
                    return response()->json(['errors',$upload]);
                }
            }

        }
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
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete_rule($empID,$id)
    {
        //
        $rule = EmployeeRules::where('rule_id','=',$id)->where('employee_id','=',$empID)->first();
        if($rule->delete()){
            return response()->json(['status' => 'success','message' => 'The Rule Has Been Deleted Successfully.']);
        }else{
            return response()->json(['status' => 'errors','message' => 'We Cloud Not found this rule .']);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete_documents($empID,$id)
    {
        //
        $documents = EmployeeDocuments::where('document_id','=',$id)->where('employee_id','=',$empID)->first();
        if($documents->delete()){
            return response()->json(['status' => 'success','message' => 'The Rule Has Been Deleted Successfully.']);
        }else{
            return response()->json(['status' => 'errors','message' => 'We Cloud Not found this document .']);
        }

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function upload_picture(Request $request)
    {
        // Form validation
        $rules = [
            'picture'     =>  'required|image|max:2048'
        ];
        $validator = Validator::make($request->all(),$rules);
        if($validator->fails()){
            return response()->json(['success' => false,'errors'=> true,'message' => $validator->errors()],500);
        }
        //
        if ($request->hasFile('picture')){
            // Get image file
            $this->picture = $request->file('picture');
            return response()->json(['success' => true,'message' => 'The File Has been Add .'],200);
        }
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function upload_document(Request $request)
    {
        // Form validation
        $rules = [
            'document_name'              =>  'required',
            'document_file'     =>  'required|max:2048'
        ];
        $validator = Validator::make($request->all(),$rules);
        if($validator->fails()){
            return response()->json(['success' => false,'errors'=> true,'message' => $validator->errors()],500);
        }
        //
        if ($request->hasFile('document_file')){
            $this->documents =  array_merge( $this->documents , ['name' => $request->input('document_name'),'file' => $request->file('document_file')] );
            return response()->json(['success' => true,'message' => 'The Document Has been Add .','data' => $this->documents],200);
        }
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

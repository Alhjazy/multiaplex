<?php

namespace App\Http\Controllers;

use App\Employee;
use App\Models\Product\Attribute;
use App\Models\Product\Brand;
use App\Models\Product\Category;
use App\Models\Product\Image;
use App\Models\Product\Product;
use App\Models\Product\ProductAttribute;
use App\Models\Product\ProductImage;
use App\Models\Project\Branch;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
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
        return view('inventory.product.datagrid');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function register_dialog_view()
    {
        //
        return view('inventory.product.dialog');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function load()
    {
        //
        $product = Product::with('category','brand')->get();
        return response()->json(['status' => 'success' , 'records' => $product,'total' => count($product)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function get_by_code($code)
    {
        //
        $product = Product::with('category','brand')->Find_By($code);
        return response()->json(['status' => 'success' , 'records' => $product]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function get_byid($id)
    {
        //
        $product = Product::with('category','brand','attribute','image')->findOrFail($id);
        return response()->json(['status' => 'success' , 'records' => [$product]]);
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
        $input['category_id'] = $request->input('category');
        $input['brand_id'] = $request->input('brand');
        $rules = [
            'category_id'           => 'required',
            'brand_id'              => 'required',
            'name'                  => 'required|max:255',
            'description'           => 'required|max:255',
            'model'                 => 'required|unique:products,model',
            'sku'                   => 'required|unique:products,sku',
            'upc'                   => 'unique:products,upc',
            'ean'                   => 'unique:products,ean',
            'jan'                   => 'unique:products,jan',
            'isbn'                  => 'unique:products,isbn',
            'mpn'                   => 'unique:products,mpn',
            'barcode'               => 'required|unique:products,barcode',
            'country_made'          => 'required',
            'production'            => 'required',
            'stored'                => 'required',
            'expenses'              => 'required',
            'raw_material'          => 'required',
            'dimensions'            => 'required',
            'length_class'          => 'required',
            'weight'                => 'required',
            'weight_class'          => 'required',
            'cost'                  => 'required',
            'price'                 => 'required',
            'tax_type'              => 'required',
            'tax_value'             => 'required',
            'attribute_name.*'      => 'required|string',
            'attribute_value.*'     => 'required|string',
            'image_name.*'          => 'required|string',
            'image_file.*'          => 'required',
            'status'                => 'required|string',
        ];

        $validator = Validator::make($input,$rules);
        if ($validator->fails()){
            return response()->json(['status' => 'errors','message'=> $validator->errors()],301);
        }
        $product  = Product::create($input);

        //create dir for product by  id
        $path = 'company/product/' . $product->id.'/';
        File::makeDirectory($path, 0777, true, true);
        // store images and move it to product dir into images folder
        if ($request->hasFile('image_file')){
            // Get image file
            $file = $request->file('image_file');
            foreach ($file as $key => $value){
                // Make a image name based on user name and current timestamp
                $name = $product->sku.'_'.$product->id.'_'.str_slug($request->input('image_name')[$key]).'_'.time();
                //
                $filename = $name. '.' . $file[$key]->getClientOriginalExtension();
                // Define folder path
                $folder = $path.'images/';
                // Upload image
                $upload = $file[$key]->move($folder,  $filename);
                // update images name for product record
                if ($upload){
                    $PRODUCTImage = new ProductImage();
                    $PRODUCTImage->product_id  = $product->id;
                    $PRODUCTImage->name = $name;
                    $PRODUCTImage->value = $filename;
                    $PRODUCTImage->status = 'ACTIVE';
                    $PRODUCTImage->save();
                }else{
                    return response()->json(['success' => false,'errors' => $upload]);
                }
            }
        }

        // store attribute
        if($input['attribute_name']){
            foreach ($input['attribute_name'] as $key => $value){
                // attach attribute to the product
                $PRODUCTAttribute = new ProductAttribute();
                $PRODUCTAttribute->name = $value;
                $PRODUCTAttribute->value = $input['attribute_value'][$key];
                $PRODUCTAttribute->product_id = $product->id;
                $PRODUCTAttribute->status = 'ACTIVE';
                $PRODUCTAttribute->save();
            }
        }
        return response()->json(['success' => true],200);
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

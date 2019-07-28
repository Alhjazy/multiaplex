<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();
Route::group(['middleware' => ['employee.auth:employee'],'domain' => 'pos.multiplex.laravel'],function (){
    Route::get('/', 'PosController@index')->name('POS');
    Route::get('/login', 'PosController@login')->name('employeeLogin');
    Route::get('/stock', 'PosController@getStock');
    Route::post('/post', 'PosController@post');
    Route::get('/load/order', 'PosController@getSalesOrder');
    Route::get('/{search}/find/order', 'PosController@findSalesOrder');
    Route::get('/customer/{search}', 'PosController@findCustomer');
});
//
//Route::middleware(['auth'])->group(function () {
//
//});

//control
Route::group(['middleware' => ['auth'],'domain' => 'control.multiplex.laravel'], function(){
    Route::get('/', 'ControlController@index');
    //employee
    Route::group(['prefix' => '/employee', 'middleware' => ['auth']], function(){
        Route::get('/', 'EmployeeController@index');
        Route::get('/load', 'EmployeeController@load');
        Route::get('/{key}/find', 'EmployeeController@find');
        Route::get('/register', 'EmployeeController@register');
        Route::post('/upload_document', 'EmployeeController@upload_document');
        Route::post('/upload_picture', 'EmployeeController@upload_picture');
        Route::post('/store', 'EmployeeController@store');
        Route::post('/{id}/update', 'EmployeeController@update');
        Route::post('/{empID}/rule/{id}/delete', 'EmployeeController@delete_rule');
        Route::post('/{empID}/document/{id}/delete', 'EmployeeController@delete_documents');
    });
    // purchase
    Route::group(['prefix' => '/purchases', 'middleware' => ['auth']], function(){
        Route::get('/', 'PurchaseController@index');
        Route::get('/datagrid', 'PurchaseController@datagrid');
        Route::get('/orders', 'PurchaseController@order_dialog_view');
        Route::get('/last', 'PurchaseController@purchase_get_last_record');
        Route::get('/load', 'PurchaseController@load');
        Route::get('/purchase/load', 'PurchaseController@purchase_load');
        Route::get('/purchase/return/load', 'PurchaseController@purchase_return_load');
        Route::post('/upload', 'PurchaseController@upload');
        Route::post('/store', 'PurchaseController@store');
    });
    //supplier
    Route::group(['prefix' => '/suppliers', 'middleware' => ['auth']], function(){
        Route::get('/', 'SupplierController@index');
        Route::get('/load', 'SupplierController@load');
        Route::post('/upload', 'SupplierController@upload');
        Route::post('/store', 'SupplierController@store');
        Route::post('/{id}/update', 'SupplierController@update');
    });
    //product
    Route::group(['prefix' => '/product', 'middleware' => ['auth']], function(){
        Route::get('/', 'ProductController@index');
        Route::get('/register', 'ProductController@register_dialog_view');
        Route::get('/load', 'ProductController@load');
        Route::post('/upload', 'ProductController@upload');
        Route::post('/store', 'ProductController@store');
        Route::get('/{id}/product', 'ProductController@get_byid');
        Route::get('/{code}/find', 'ProductController@get_by_code');
    });
    //stock
    Route::group(['prefix' => '/stock', 'middleware' => ['auth']], function(){
        Route::get('/', 'StockController@index');
        Route::get('/load', 'StockController@load');
        Route::get('/movement', 'StockController@load_movement');
        Route::post('/upload', 'ProjectController@locations_upload');
        Route::post('/store', 'ProjectController@locations_store');
    });
    //location
    Route::group(['prefix' => '/locations', 'middleware' => ['auth']], function(){
        Route::get('/', 'ProjectController@locations_view');
        Route::get('/load', 'ProjectController@locations_load');
        Route::post('/upload', 'ProjectController@locations_upload');
        Route::post('/store', 'ProjectController@locations_store');
    });
    //Project
    Route::group(['prefix' => '/project', 'middleware' => ['auth']], function(){
        Route::get('/', 'ProjectController@index');
    });
    //Sales
    Route::group(['prefix' => '/sales', 'middleware' => ['auth']], function(){
        Route::get('/', 'SalesController@index');
        Route::get('/load', 'SalesController@load');
        Route::get('/product/{code}/{location}/find', 'SalesController@get_product_by_code');
        Route::post('/store', 'SalesController@store');
        Route::post('/update', 'SalesController@update');
        Route::get('/last', 'SalesController@sales_get_last_record');
        Route::get('/pay/last', 'SalesController@sales_get_last_payment_record');
        Route::get('/{id}/find', 'SalesController@get_by_id');
        Route::get('/invoice', 'SalesController@sales_invoice');
    });
    //Customers
    Route::group(['prefix' => '/customers', 'middleware' => ['auth']], function(){
        Route::get('/', 'CustomerController@index');
        Route::get('/{code}/find', 'CustomerController@index');
        Route::get('/load', 'CustomerController@load');
    });
    //Finance
    Route::group(['prefix' => '/finance', 'middleware' => ['auth']], function(){
        Route::get('/', 'ProjectController@index');
    });
    //Marketing
    Route::group(['prefix' => '/marketing', 'middleware' => ['auth']], function(){
        Route::get('/', 'ProjectController@index');
    });
});


//settings
Route::group(['prefix' => '/settings', 'middleware' => ['auth']], function(){
    Route::get('/', 'SettingsController@index');
    Route::group(['prefix' => '/general', 'middleware' => ['auth']], function(){
        Route::get('/', 'SettingsController@general_settings_view');
        Route::get('/company', 'SettingsController@company_settings_view');
        Route::post('/company/update', 'SettingsController@company_settings_update');
        //purchase
        Route::get('/purchase', 'SettingsController@purchase_settings_view');
        Route::post('/purchase/update', 'SettingsController@purchase_settings_update');
        Route::get('/purchase/load', 'SettingsController@purchase_settings_load');
    });
    //HRMS
    Route::group(['prefix' => '/hrms', 'middleware' => ['auth']], function(){
        Route::get('/rules', 'SettingsController@roles_view');
        Route::get('/rules/load', 'SettingsController@rules_load');
        Route::get('/rules/store', 'SettingsController@roles_store');
    });
    Route::group(['prefix' => '/inventory', 'middleware' => ['auth']], function(){
        //category
        Route::get('/category', 'SettingsController@category_view');
        Route::get('/category/load', 'SettingsController@category_load');
        Route::get('/category/store', 'SettingsController@category_store');
        //brand
        Route::get('/brand', 'SettingsController@brand_view');
        Route::get('/brand/load', 'SettingsController@brand_load');
        Route::get('/brand/store', 'SettingsController@brand_store');
    });
});




//Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => '/hrms', 'middleware' => ['auth']], function(){

});

Route::group(['prefix' => '/purchases', 'middleware' => ['auth']], function(){

});

Route::group(['prefix' => '/inventory', 'middleware' => ['auth']], function(){
    Route::get('/', 'InventoryController@index');
});

Route::group(['prefix' => '/project', 'middleware' => ['auth']], function(){
    Route::get('/', 'ProjectController@index');
});



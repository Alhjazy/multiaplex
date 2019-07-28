<?php

namespace App\Sales;

use Illuminate\Database\Eloquent\Model;

class SalesOrder extends Model
{
    //
    protected $fillable =[
            'customer_id','location_id','employee_id','issue_date','expiry_date','due_date','total_amount',
            'total_tax_amount','total_qty','total_discount_amount','total_items','total_balance','total_due','outstanding_balance','description',
        'remark','type','status','reference'
    ];







    public function scopeFind_By($query, $search)
    {

        return $query
            ->where( 'reference', '=', "{$search}")
            ->orWhere('customer_id','=', "{$search}")
            ->orWhere('issue_date','=', "{$search}")
            ->orWhere('total_balance','=', "{$search}");
    }

    /**
     * Get the user that owns the phone.
     */
    public function customer()
    {
        return $this->belongsTo('App\Models\Customer\Customer', 'customer_id', 'id');
    }

    /**
     * Get the user that owns the phone.
     */
    public function location()
    {
        return $this->belongsTo('App\Models\Project\location', 'location_id', 'id');
    }

    /**
     * Get the user that owns the phone.
     */
    public function employee()
    {
        return $this->belongsTo('App\Models\Employee\Employee', 'employee_id', 'id');
    }

    /**
     * Get the user that owns the phone.
     */
    public function order_items()
    {
        return $this->hasMany('App\Models\Sales\SalesOrderItem', 'sales_order_id', 'id');
    }

    /**
     * Get the user that owns the phone.
     */
    public function order_items_with_details()
    {
        return $this->hasMany('App\Models\Sales\SalesOrderItem', 'sales_order_id', 'id');
    }

    /**
     * Get the user that owns the phone.
     */
    public function order_items_details()
    {
        return $this->hasManyThrough('App\Models\Product\Product','App\Models\Sales\SalesOrderItem', 'sales_order_id','id','id','product_id');
    }

    /**
     * Get the user that owns the phone.
     */
    public function order_shipping()
    {
        return $this->hasMany('App\Models\Sales\SalesShipping', 'sales_order_id', 'id');
    }

    /**
     * Get the user that owns the phone.
     */
    public function order_payment()
    {
        return $this->hasMany('App\Models\Sales\SalesPayment', 'sales_order_id', 'id');
    }
    /**
     * Get the user that owns the phone.
     */
    public function order_document()
    {
        return $this->hasMany('App\Models\Sales\SalesDocument', 'sales_order_id', 'id');
    }
}

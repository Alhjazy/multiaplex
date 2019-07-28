<?php

namespace App\Models\Purchase;

use Illuminate\Database\Eloquent\Model;

class PurchaseOrder extends Model
{
    //
    protected $fillable = [
        'reference','supplier_id','location_id','expiry_date','issue_date','description','type','status','state',
        'total_amount','total_tax_amount','total_qty','total_discount_amount','total_items','total_balance','total_due','outstanding_balance','remark'
    ];


    /**
     * Get the user that owns the phone.
     */
    public function supplier()
    {
        return $this->belongsTo('App\Models\Supplier\Supplier', 'supplier_id', 'id');
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
        return $this->hasMany('App\Models\Purchase\PurchaseOrderItem', 'order_id', 'id');
    }

    /**
     * Get the user that owns the phone.
     */
    public function order_shipping()
    {
        return $this->hasMany('App\Models\Purchase\PurchaseShipping', 'pord_id', 'id');
    }

    /**
     * Get the user that owns the phone.
     */
    public function order_payment()
    {
        return $this->hasMany('App\Models\Purchase\PurchasePayment', 'pord_id', 'id');
    }
    /**
     * Get the user that owns the phone.
     */
    public function order_document()
    {
        return $this->hasMany('App\Models\Purchase\PurchaseDocument', 'pord_id', 'id');
    }
}

<?php

namespace App\Models\Setting;

use Illuminate\Database\Eloquent\Model;

class CompanySettings extends Model
{
    //
    protected $table = 'company_settings';

    protected $fillable = [
        'name','email','website','phone','telephone','currency','certification_number','tax_registration_number',
        'employee_count','year_of_establishment','office_timings_start','office_timings_end','product_categories','country','address_line1','address_line2',
        'zip_code','city','fax','logo','image_trade_license','image_1','image_2','image_3','image_4','profile','about','tax_registration_date','status'
    ];
}

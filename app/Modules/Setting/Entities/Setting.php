<?php

namespace App\Modules\Setting\Entities;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    const FILE_PATH = '/uploads/setting/';

    protected $fillable = [
    	
	    'main_navbar_color',
    	'secondary_navbar_color',
    	'page_header_color',
        'company_name',
        'address_1',
        'address_2',
        'phone_1',
        'phone_2',
        'mobile_1',
        'mobile_2',
        'website',
        'email_1',
        'email_2',
        'company_logo',
        'facebook_link',
        'instagram_link',
        'linkin_link',
        'pf',
        'gratuity',
        'ssf',
        'ssf_tax',
        'basic_salary_percentage',
        'created_by',
        'updated_by',
        'bank_account',
        'bank_name',
        'normal_holiday_ot_rate',
        'special_holiday_ot_rate',
        'general_ot_rate'
    ];
}

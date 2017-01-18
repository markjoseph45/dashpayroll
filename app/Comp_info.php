<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comp_info extends Model
{
    protected $table = 'tbl_company_info';

    protected $fillable = [
    	'user_id', 'company_name', 'email_address', 'contact_person',
    ];

    public $timestamps = false;

}

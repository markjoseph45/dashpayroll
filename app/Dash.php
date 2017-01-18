<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dash extends Model
{
    protected $table = 'tbl_user';

    protected $fillable = [
    	'username', 'password', 'email',
    ];

    protected $hidden = [
    	'password',
    ];

    public $timestamps = false;

}

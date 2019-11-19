<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class staff extends Model
{
    protected $fillable = [
    	'fname',
    	'lname',
    	'username',
    	'pwd',
    	'role'
    ];
}

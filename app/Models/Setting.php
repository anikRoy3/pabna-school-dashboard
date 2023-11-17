<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $table= 'settings';
    protected $fillable = [
        'school_name', 'school_logo', 'emails', 'mobile_numbers', 'school_code', 'college_code', 'EIIN_no', 'address'
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Directors extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'email', 'designation', 'phone', 'image', 'd_c_id', 'biodata', 'speech'] ;
    protected $table='directors';
}

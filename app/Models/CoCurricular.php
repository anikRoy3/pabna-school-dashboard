<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CoCurricular extends Model
{
    use HasFactory;
    protected $fillable = [
        'exam_name',
        'exam_year',
        'total_candidates',
        'attended_candidates',
        'a_plus_holder',
        'total_pass',
        'pass_rate',
    ];
    protected $table = 'co_curricular';
}

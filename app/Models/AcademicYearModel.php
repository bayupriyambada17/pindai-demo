<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AcademicYearModel extends Model
{
    use HasFactory;

    protected $table = 'academic_year';
    protected $guarded = [
        'id'
    ];

}

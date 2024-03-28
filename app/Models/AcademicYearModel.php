<?php

namespace App\Models;

use App\Models\SemesterModel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AcademicYearModel extends Model
{
    use HasFactory;

    protected $table = 'academic_year';
    protected $guarded = [
        'id'
    ];

    public function semesters()
    {
        return $this->hasMany(SemesterModel::class, 'academic_year_id', 'id')->select('id', 'name', 'start_month', 'end_month', 'academic_year_id');
    }
}

<?php

namespace App\Models;

use App\Models\AcademicYearModel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SemesterModel extends Model
{
    use HasFactory;

    protected $table = 'semesters';
    protected $guarded = ['id'];

    public function academicYear()
    {
        return $this->belongsTo(AcademicYearModel::class, 'academic_year_id');
    }
}

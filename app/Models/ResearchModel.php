<?php

namespace App\Models;

use App\Models\User;
use App\Traits\SearchableTrait;
use App\Models\AcademicYearModel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ResearchModel extends Model
{
    use HasFactory, SearchableTrait;

    protected $table = 'research';
    protected $guarded = ['id'];

    public function lecturer()
    {
        return $this->belongsTo(User::class, 'lecturer_id', 'id');
    }

    public function academicYear()
    {
        return $this->belongsTo(AcademicYearModel::class, 'academic_year_id', 'id');
    }
}

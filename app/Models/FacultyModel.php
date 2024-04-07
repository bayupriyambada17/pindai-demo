<?php

namespace App\Models;

use App\Models\User;
use App\Models\ResearchModel;
use App\Traits\SearchableTrait;
use App\Models\AcademicYearModel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class FacultyModel extends Model
{
    use HasFactory, SearchableTrait;
    protected $table = 'faculty';
    protected $guarded = ['id'];

    public function dosen()
    {
        return $this->hasMany(User::class, 'faculty_id', 'id');
    }
    public function lecturer()
    {
        return $this->hasMany(User::class, 'faculty_id', 'id');
    }
    public function research()
    {
        return $this->hasManyThrough(ResearchModel::class, User::class, 'faculty_id', 'lecturer_id', 'id');
    }

}

<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class FacultyModel extends Model
{
    use HasFactory;
    protected $table = 'faculty';
    protected $guarded = ['id'];

    public function dosen()
    {
        return $this->hasMany(User::class, 'faculty_id', 'id');
    }

}

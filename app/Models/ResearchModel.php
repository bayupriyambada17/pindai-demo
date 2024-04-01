<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ResearchModel extends Model
{
    use HasFactory;

    protected $table = 'research';
    protected $guarded = ['id'];

    public function dosen()
    {
        return $this->belongsTo(User::class, 'dosen_id', 'id');
    }

    public function tahunAkademik()
    {
        return $this->belongsTo(TahunAkademik::class, 'tahun_akademik_id', 'id');
    }
}

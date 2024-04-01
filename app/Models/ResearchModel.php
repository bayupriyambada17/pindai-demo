<?php

namespace App\Models;

use App\Models\User;
use App\Traits\SearchableTrait;
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

    public function tahunAkademik()
    {
        return $this->belongsTo(TahunAkademik::class, 'tahun_akademik_id', 'id');
    }
}

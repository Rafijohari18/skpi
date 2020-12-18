<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    protected $table = 'mahasiswa';
    protected $guarded = [];
    
    public function Kelas()
    {
        return $this->belongsTo('App\Models\Kelas','kelas_id');
    }
    public function Gelar()
    {
        return $this->belongsTo('App\Models\Gelar','gelar_id');
    }
    public function JenjangPendidikan()
    {
        return $this->belongsTo('App\Models\JenjangPendidikan','jenjang_pendidikan_id');
    }
    public function ProgramStudi()
    {
        return $this->belongsTo('App\Models\ProgramStudi','program_studi_id');
    }

    public function User()
    {
        return $this->belongsTo('App\Models\User','user_id');
    }
}

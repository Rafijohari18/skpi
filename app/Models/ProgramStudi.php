<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProgramStudi extends Model
{
    protected $table = 'program_studi';
    protected $guarded = [];
    
    public function Mahasiswa(){
        return $this->hasMany('App\Models\Mahasiswa','program_studi_id');
    }
}

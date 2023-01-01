<?php

namespace App\Models;

use DB;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;

    protected $table = "siswa";
    protected $primaryKey = "id_siswa";
    public $timestamp = true;

    protected $guarded = [];

    public function guru(){
        return $this->belongsTo(Guru::class, 'id_guru');
    }

    static function get_by_id($id_guru){
        $data = DB::table("siswa")->where('id_guru',$id_guru)->get();
        return $data;
    }

}

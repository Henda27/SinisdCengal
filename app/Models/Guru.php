<?php

namespace App\Models;
use DB;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
    use HasFactory;
    protected $table = "guru";
    protected $primaryKey = "id_guru";
    public $timestamp = true;

    protected $fillable = [
        'id_users',
        'nip',
        'nama_guru',
        'kelas',
    ];

    static function get_all(){
        $data = DB::table('guru')->get();
        return $data;
    }

    static function get_by_id($id_guru){
        $data = DB::table("guru")->where('id_guru',$id_guru)->get();
        return $data;
    }

    static function user(){
        return $this->belongsTo(User::class);
    }
}

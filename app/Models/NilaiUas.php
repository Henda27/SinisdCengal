<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class NilaiUas extends Model
{
    use HasFactory;
    protected $table = "nilai_uas";
    protected $primaryKey='id_nilai';
    public $timestamp = true;

    protected $fillable = ['id_mapel','id_guru','id_siswa','nama_mapel','tema1','tema2','tema3','tema4','jumlah','nilai_akhir'];


    static function get_all(){
        $data = DB::table('nilai')->get();
        return $data;
    }

    static function get_by_id_mapel($id_mapel){
        $data = DB::table("nilai")->where('id_mapel',$id_mapel)->get();
        return $data;
    }

    static function get_by_id_guru($id_guru){
        $data = DB::table("nilai")->where('id_guru',$id_guru)->get();
        return $data;
    }

    static function nilai_delete_by_id($id){
        $delete = DB::DELETE("DELETE FROM nilai WHERE id_mapel ='".$id_mapel."' ");
        return $delete;
    }

    public function guru()
    {
        return $this->belongsTo(Guru::class, 'id_guru');
    }

    public function siswa()
    {
        return $this->belongsTo(Siswa::class, 'id_siswa');
    }
    
    public function mapel()
    {
        return $this->belongsTo(Mapel::class, 'id_mapel');
    }
}

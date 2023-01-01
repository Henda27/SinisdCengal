<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GNilai extends Model
{
    use HasFactory;

    protected $table = "nilai";
    protected $primaryKey = "id_nilai";
    public $timestamp = true;

    protected $guarded = [];
    
}

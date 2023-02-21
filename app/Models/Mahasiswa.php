<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory;
    protected $guarded=[];
    protected $table = 'mahasiswas';
    protected $primaryKey = 'id';
    protected $fillable = ['nim', 'nama', 'jenis_kelamin', 'jurusan_id', 'alamat' ];

    public function jurusan()
    {
    	return $this->belongsTo(Jurusan::class);
    }
}

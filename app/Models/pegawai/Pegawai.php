<?php

namespace App\Models\pegawai;

use App\Models\Jabatan\Jabatan;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    use HasFactory;
    protected $table = 'pegawai';
    protected $fillable = [
        'image',
        'email',
        'name',
        'tanggal_lahir',
        'jenis_kelamin',
        'jabatan_id',
        'alamat',
    ];

    // relasi ke jabatan
    public function jabatan(){
        return $this->belongsTo(Jabatan::class);
    }
}

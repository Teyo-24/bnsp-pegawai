<?php

namespace App\Models\Jabatan;

use App\Models\pegawai\Pegawai;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jabatan extends Model
{
    use HasFactory;
    protected $table = 'jabatan';
    protected $fillable = [
        'jabatan'
    ];

    public function pegawai(){
        return $this->hasOne(Pegawai::class);
    }
}

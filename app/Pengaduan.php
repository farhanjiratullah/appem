<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pengaduan extends Model
{
    protected $table = 'pengaduans';
    protected $fillable = ['tanggal_pengaduan', 'masyarakat_nik', 'isi_laporan', 'foto', 'status'];

    public function masyarakat() {
        return $this->belongsTo('App\Masyarakat');
    }

    public function tanggapan() {
        return $this->hasMany('App\Tanggapan');
    }
}

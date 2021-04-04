<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tanggapan extends Model
{
    use SoftDeletes;

    protected $table = 'tanggapans';
    protected $fillable = ['pengaduan_id', 'tanggal_tanggapan', 'tanggapan', 'petugas_id'];

    public function pengaduan() {
        return $this->belongsTo('App\Pengaduan');
    }

    public function petugas() {
        return $this->belongsTo('App\Petugas');
    }
}

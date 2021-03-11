<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tanggapan extends Model
{
    protected $table = 'tanggapans';
    protected $fillable = ['pengaduan_id', 'tanggal_tanggapan', 'tanggapan', 'petugas_id'];
}

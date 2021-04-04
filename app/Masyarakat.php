<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Masyarakat extends Authenticatable
{
    protected $table = 'masyarakats';
    protected $fillable = ['nama', 'username', 'password', 'telp'];
    protected $primaryKey = 'nik';
    protected $guard = 'masyarakat';
    protected $hidden = ['password'];

    public function pengaduans() {
        return $this->hasMany('App\Pengaduan');
    }

    // this is the recommended way for declaring event handlers
    public static function boot() {
        parent::boot();
        self::deleting(function($masyarakat) { // before delete() method call this
            $masyarakat->pengaduans()->each(function($pengaduan) {
                $pengaduan->delete(); // <-- direct deletion
            });
            // do the rest of the cleanup...
        });
    }
}

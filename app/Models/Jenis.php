<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Jenis extends Model
{
    protected $table = 'produk';
    protected $fillable = [
        'user_id',
        'nama_jenis',
    ];

    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }
    public function jenis()
    {
        return $this->hasMany(Jenis::class,'jenis_id');
    }
}

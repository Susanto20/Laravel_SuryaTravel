<?php

namespace App;

use Storage;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';
    protected $with =  ['user'];
    protected $fillable = [
        'user_id',
        'tujuan',
        'tanggal_berangkat',
        'jam',
        'jumlah_kursi',
        'file',
        'status',
        'total',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function getUserAttribute()
    {
        return $this->belongsTo(User::class);
    }
}

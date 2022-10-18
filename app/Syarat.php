<?php

namespace App;

use Storage;
use Illuminate\Database\Eloquent\Model;

class Syarat extends Model
{
    protected $table = 'syarats';
    protected $with =  ['user'];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function getUserAttribute()
    {
        return $this->belongsTo(User::class);
    }
}

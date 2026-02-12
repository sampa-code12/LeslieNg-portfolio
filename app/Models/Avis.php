<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;

class Avis extends Model
{
    protected $table = 'avis';
    protected $fillable = [
        'user_id',
        'message',
        'published_at',
    ];

    public function cast():Array
    {
        return ['published_at'=>'datetime'];
    }
    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }

}

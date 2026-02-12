<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    protected $table = 'skills';

    protected $fillable = [
        'name',
        'level',
        'category',
        'published_at'
    ];

    public function cast():array{
        return [
            'published_at'=>'datetime',
        ];
    }

    public function services(){
        return $this->belongsToMany(Service::class, 'service_id');
    }

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }
}

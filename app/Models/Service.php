<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $table = 'services';
    protected $fillable = [
        'user_id',
        'title',
        'slug',
        'description',
        'category',
        'published_by',
        'published_at',
    ];

    protected $casts = [
        'published_at' => 'datetime',
        'published_by' => 'datetime',
    ];

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function skills(){
        return $this->belongsToMany(Skill::class);
    }

    
}

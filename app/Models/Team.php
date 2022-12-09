<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;

    public $fillable=[
        'task_id',
        'user_id',
        'last_activity',
        'status',
    ];

    public function getUser(){
        return $this->belongsTo(User::class,'user_id','id');
    }
}

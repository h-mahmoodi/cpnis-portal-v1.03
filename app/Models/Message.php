<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

    public $fillable=[
        'to',
        'from',
        'body',
    ];

    public function getToUser(){
        return $this->hasOne(User::class,'id','to');
    }

    public function getToFrom(){
        return $this->hasOne(User::class,'id','from');
    }

}

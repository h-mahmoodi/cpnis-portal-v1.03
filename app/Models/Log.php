<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    use HasFactory;


    protected $table="logs";

    protected $fillable=[
        'type',
        'message',
        'user_id',
        'status',
    ];

    public function getUser(){
        return $this->belongsTo(User::class,'user_id','id');
    }

}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;


class Reminder extends Model
{
    use HasFactory,Notifiable;

    protected $fillable=[
        'body',
        'user_id',
        'status',
        'reminder_date',
    ];

    public function routeNotificationForMail(){
        $user=User::findOrFail($this->user_id);
        return $user->email;
    }

    public function getUser(){
        return $this->belongsTo(User::class,'user_id','id');
    }



}

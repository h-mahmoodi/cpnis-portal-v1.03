<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;


class Activity extends Model
{
    use HasFactory,Notifiable;

    protected $fillable = [
        'task_id',
        'description',
        'status',
        'sender_id',
        'worker_id',
        'reply_id',
    ];

    public function getSender(){
        return $this->hasOne(User::class,'id','sender_id')->withDefault(['name' => 'No Sender']);
    }

    public function getWorker(){
        return $this->hasOne(User::class,'id','worker_id')->withDefault(['name' => 'No Worker']);
    }

    public function getTask(){
        return $this->belongsTo(Task::class,'task_id','id')->withDefault(['title' => 'No Task']);
    }


}

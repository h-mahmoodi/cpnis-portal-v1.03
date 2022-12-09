<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;


    protected $fillable=[
        'creator_id',
        'title',
        'description',
        'type_id',
        'worker_id',
        'lock',
        'priority',
        'status',
    ];




    public function getCreator(){
        return $this->belongsTo(User::class,'creator_id','id')->withDefault(['name' => 'No Creator']);
    }

    public function getWorker(){
        return $this->belongsTo(User::class,'worker_id','id')->withDefault(['name' => 'No Worker']);
    }

    public function getActivities(){
        return $this->hasMany(Activity::class,'task_id','id');
    }

    public function getType(){
        return $this->belongsTo(TaskType::class,'type_id','id')->withDefault(['name' => 'No Type']);
    }

    public function getTeamsMemberAttribute() {
        $users=User::find(json_decode($this->teams));
        return $users;
    }

    public function getTeams(){
        return $this->hasMany(Team::class,'task_id','id');
    }

    // $getMemberTeams=User::find($this->teams);
}

<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'updated_at'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function routeNotificationForMail(){
        return $this->email;
    }

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getCreatedTasks(){
        return $this->hasMany(Task::class,'creator_id','id');
    }

    public function getWorkingTasksAttribute(){
        // return $this->hasMany(Task::class,'worker_id','id');
        $taks=Task::find(Team::where('user_id',1)->where('status',1)->pluck('task_id'));
        return $taks;
    }

    public function getWorkingActivities(){
        return $this->hasMany(Activity::class,'worker_id','id');
    }

    public static function getUserNameById($id){
        return User::where('id', $id)->pluck('name')->first();
    }

    public function getTeams(){
        return $this->hasMany(Team::class,'user_id','id');
    }

}

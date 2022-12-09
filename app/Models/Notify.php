<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notify extends Model
{
    use HasFactory;

    protected $table="notifys";

    protected $fillable=[
        'type',
        'activity_id',
        'user_id'
    ];


}

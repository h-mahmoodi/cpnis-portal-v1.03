<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class SiteSetting extends Model
{
    use HasFactory,Notifiable;

    protected $table="site_settings";

    public $timestamps = false;


    protected $fillable=[
        'invitation_code',
    ];


    public function routeNotificationForMail()
    {

    return $this->email;
    }
}

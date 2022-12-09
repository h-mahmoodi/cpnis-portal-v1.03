<?php

namespace App\Providers;

use App\Models\Activity;
use App\Models\Reminder;
use App\Models\Task;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {


        View::composer('*',function($view){
            $view->with('userActivitiesCount', count(Activity::where('worker_id',Auth::id())->where('status','!=',2)->get()));
        });

        View::composer('*',function($view){
            $view->with('userRemindersCount', count(Reminder::where('user_id',Auth::id())->where('status',0)->get()));
        });


            View::composer('*',function($view){
                if(Auth::user()){
                $tasks=Auth::user()->getTeams;
                $view->with('userTasksCount' , count($tasks));
            }
            });





    }
}

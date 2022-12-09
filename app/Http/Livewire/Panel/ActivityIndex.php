<?php

namespace App\Http\Livewire\Panel;

use App\Models\Activity;
use App\Models\Document;
use App\Models\Task;
use App\Models\User;
use Livewire\Component;

use Illuminate\Pagination\LengthAwarePaginator;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;
use Livewire\WithPagination;

class ActivityIndex extends Component
{
    use WithPagination;

    public $activities;

    public $totalActivities;

    public $activitiesCount;

    public $openActivities;

    public $sortOrder;

    public $search_text;


    public $perPage;

    public $user_id;

    public $users;



    public function mount($task_id,$user_id){
        $this->users=User::all();

        if(Auth::user()->role==2){
            $this->activities=Activity::all();
        }
        else{
            $this->activities=Activity::where('worker_id',Auth::id())->orWhere('sender_id',Auth::id())->get();
        }

        $this->totalActivities=$this->activities;
        if($task_id){
            $this->activities=$this->activities->where('task_id',$task_id);
            $this->totalActivities=Activity::all();
        }

        if($user_id){

            $this->user_id=$user_id;
            $this->activities=$this->activities->filter(function($activity){
                if($activity->worker_id == $this->user_id ){
                    return true;
                }
                else
                    return false;

            });
            $this->totalActivities=Activity::all();
        }

        $this->activities=$this->activities->sortBy('status');

        $this->activitiesCount=$this->totalActivities->count();
        $this->sortOrder='desc';

        $this->perPage=10;
    }


    public function sortByFeields($field){
        if($this->sortOrder=='desc'){
            $this->activities=$this->activities->sortBy([
                [$field,'desc'],
            ]);
            $this->sortOrder='asc';
            return $this->activities;
        }
        else{
            $this->activities=$this->activities->sortBy([
                [$field,'asc'],
            ]);
            $this->sortOrder='desc';
            return $this->activities;
        }
        $this->perPage=10;

    }


    public function filter($column="",$value=""){
        if($column=="" && $value==""){
            return $this->activities=$this->totalActivities;
        }
        return $this->activities=$this->totalActivities->where($column , $value);
    }


    public function updatedSearchText(){
        if($this->search_text!=""){
            $this->activities=Activity::where('id',$this->search_text)
            ->orWhere('task_id',$this->search_text)->get();
    }
        else{
            $this->activities=$this->totalActivities;
        }


            $this->perPage=5;
    }




    public function showMore(){
        $this->perPage+=10;
    }




    public function render()
    {
        // $perPage = 4;


        $collection = $this->activities;

        $items = $collection->forPage($this->page, $this->perPage);

        $paginator = new LengthAwarePaginator($items, $collection->count(), $this->perPage, $this->page);

        return view('livewire.panel.activity-index', ['activitylist' => $paginator]);
    }
}

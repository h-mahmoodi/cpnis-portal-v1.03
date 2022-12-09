<?php

namespace App\Http\Livewire\Panel;


use App\Models\Task;
use App\Models\User;
use Livewire\Component;

use Illuminate\Pagination\LengthAwarePaginator;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;
use Livewire\WithPagination;

class TaskIndex extends Component
{


    use WithPagination;

    public $tasks;

    public $totalTasks;

    public $tasksCount;

    public $openTasks;

    public $sortOrder;

    public $search_text;


    public $perPage;

    public $users;



    public function mount(){


        $this->tasks=collect();
        if(Auth::user()->role==2){
            $this->tasks=Task::all();
        }
        else{
            $this->tasks=Task::find(Auth::user()->getTeams->pluck('task_id')) ;
            // foreach(Task::all() as $taskItem){
            //     if(in_array(Auth::id(),json_decode($taskItem->teams))){
            //         $this->tasks->push($taskItem);
            //     }
            // }
            // $this->tasks=Task::where('creator_id',Auth::id())->orWhere('worker_id',Auth::id())->get();
        }


            $this->totalTasks=$this->tasks;

            $this->users=User::all();

        $this->tasksCount=$this->totalTasks->count();
        $this->sortOrder='desc';

        $this->perPage=10;

        // $userTest=User::find(2);

        // dd($userTest->WorkingTasks);
    }


    public function sortByFeields($field){
        if($this->sortOrder=='desc'){
            $this->tasks=$this->tasks->sortBy([
                [$field,'desc'],
            ]);
            $this->sortOrder='asc';
            return $this->tasks;
        }
        else{
            $this->tasks=$this->tasks->sortBy([
                [$field,'asc'],
            ]);
            $this->sortOrder='desc';
            return $this->tasks;
        }
        $this->perPage=10;

    }


    public function filter($column="",$value=""){
        if($column=="" && $value==""){
            return $this->tasks=$this->totalTasks;
        }
        return $this->tasks=$this->totalTasks->where($column , $value);
    }

    public function filterByUser($user_id){
        return $this->tasks=Task::find(User::find($user_id)->getTeams->pluck('task_id')) ;
    }


    public function updatedSearchText(){
        if($this->search_text!=""){
            $this->tasks=Task::where('id',$this->search_text)
            ->orWhere('title','like','%'.$this->search_text.'%')->get();
    }
        else{
            $this->tasks=$this->totalTasks;
        }


            $this->perPage=10;
    }




    public function showMore(){
        $this->perPage+=10;
    }




    public function render()
    {
        // $perPage = 4;

        $collection = $this->tasks;

        $items = $collection->forPage($this->page, $this->perPage);

        $paginator = new LengthAwarePaginator($items, $collection->count(), $this->perPage, $this->page);

        return view('livewire.panel.task-index', ['tasklist' => $paginator]);
    }
}

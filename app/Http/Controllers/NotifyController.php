<?php

namespace App\Http\Controllers;

use App\Models\Document;
use App\Models\Notify;
use App\Models\SiteSetting;
use App\Notifications\DocumentNotify;
use App\Notifications\IeltsNotification;
use App\Notifications\RemindmeNotification;
use App\Notifications\ResubmiteNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Notification;

class NotifyController extends Controller
{


    public function index(){
        $notifys=Notify::all();
        return view('notify.index',compact('notifys'));
    }

    public function manualnotify(Request $request){
        $document=Document::find($request->id);
        $setting=SiteSetting::find(1);

        $emails=explode(',',$document->email);
        // dd($emails);
        // foreach ($emails as $key => $value) {


        // }
        try {

            if($document){
                Notification::send([$document],new IeltsNotification());
                dd('hi');
            }
            else if($document->document_type=="ReSubmite"){
                Notification::send([$document,$setting],new ResubmiteNotification());
            }
            else if($document->document_type=="RemindeMe"){
                Notification::send([$document,$setting],new RemindmeNotification());
            }

            $document->last_notify=Carbon::now();
            $document->save();

            $notify=new Notify();
            $notify->type='email';
            $notify->document_id=$document->id;
            $notify->save();

            // Notification::send($setting,new IeltsNotification());


            return redirect()->route('index');
        }
        catch (\Throwable $th) {
            return $th;
        }


    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Log;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;


class LogController extends Controller
{
    public function index(){
        if (Auth::user()->cannot('admin-role')) {
            Alert::toast('You Have No Access 403', 'error');
            return redirect()->back();
        }

        $logs=Log::orderBy('id', 'desc')->paginate(20);
        return view('log.index',compact('logs'));
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Email;
use Illuminate\Http\Request;

class EmailController extends Controller
{
    public function edit(){
        $emails=Email::all();
        return view('email.edit',compact('emails'));

    }

    public function update(Request $request)
    {
        $email=Email::where('type',$request->type)->first();


        $validated=$request->validate([
            'type' => 'nullable',
            'name' => 'required|max:20',
            'email' => 'required|email',
            'subject' => 'required|max:40',
            'text' => 'required',
        ]);

        $email->name=$request->name;
        $email->email=$request->email;
        $email->subject=$request->subject;
        $email->text=$request->text;

        $email->save();

        return redirect()->back();


    }

}

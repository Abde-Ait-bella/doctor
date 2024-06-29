<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;

class EmailController extends Controller
{
    public function create()
    {
        return view('email');
    }

    public function sendEmail(Request $request)
    {
        $request->validate([
          'email' => 'required|email',
          'phone' => 'required',
          'name' => 'required',
          'message' => 'required',
        ]);

        $data = [
          'subject' => $request->message,
          'name' => $request->name,
          'services' => $request->services,
          'email' => $request->email,
          'phone' => $request->phone
        ];

        Mail::send('email-template', $data, function($message) use ($data) {
          $message->to($data['email'])
          ->subject('Welcome to Our Service');
        });

        return back()->with(['message' => 'Email successfully sent!']);
    }
}

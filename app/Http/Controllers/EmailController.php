<?php

namespace App\Http\Controllers;

use App\Mail\AttachmentMail;
use App\Mail\MyMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class EmailController extends Controller
{
    public function email()
    {
        // Mail::to('heemaun@gmail.com')->send(new AttachmentMail());
        // Mail::to('heemaun@gmail.com')->send(new MyMail);
    }
    public function sendEmail(Request $request,$email)
    {
        $emailData = [
            'sender' => $email,
            'text' => $request->body,
        ];
        Mail::to($request->names)->send(new MyMail($emailData));
        // return $email;
        return back();
    }
}
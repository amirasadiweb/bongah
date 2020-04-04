<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Mail;
use App\User;

class EmailController extends Controller
{

    public function sendMail()
    {
        $user = User::findOrFail(1);

        Mail::send('email.send', ['user' => $user], function ($m) use ($user) {
            $m->to($user->email, $user->name)->subject('Your laravel!');
        });
    }


}

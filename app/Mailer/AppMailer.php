<?php
/**
 * Created by PhpStorm.
 * User: amirasadi
 * Date: 11/29/2017
 * Time: 4:43 PM
 */

namespace App\Mailer;
use App\User;

use  Mail;


class AppMailer
{
   protected $from='amirasadi@gmail.com';
   protected $to;
   protected $data=[];
   protected $mailer;


    public function SendMailConfirm(User $user)
    {
        $this->to = $user->email;
        $this->view = 'email.confirm';
        Mail::send($this->view,['user'=>$user], function ($m) use($user)  {
            $m->from($this->from,'Admin');
            $m->to($user->email,$user->name)->subject('تایید ایمیل شما');
        });
    }

}
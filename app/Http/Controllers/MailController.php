<?php
/**
 * Created by PhpStorm.
 * User: Tammy
 * Date: 2018/10/7
 * Time: 20:32
 */
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function send($user_email)
    {
        Mail::send('email/code', ['name' => 'name'], function($message) use ($user_email)
        {
            $message->to($user_email)->subject('content');
        });
    }
}


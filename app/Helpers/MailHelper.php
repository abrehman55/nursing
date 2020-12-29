<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Mail;

class MailHelper{
    public static function sendInvoice($receiver){
        $data = ['code' => $receiver->code];
        
        Mail::send('mail.code', $data, function ($message) use ($receiver){
            $message->from('support@hospital.app', 'Hospital App');
            $message->to($receiver->email, $receiver->name)
            ->subject('Verification Code');
        });
    }
}
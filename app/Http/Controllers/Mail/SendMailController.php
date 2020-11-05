<?php

namespace App\Http\Controllers\Mail;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Mail\TestMail;
use App\Mail\SuccessMail;
use App\Mail\FailMail;
use App\nknhaphoc;
use Illuminate\Support\Facades\Mail;

class SendMailController extends Controller
{
    public function camon(Request $request)
    {
        $status=$request->get('status');
        $tenhs=$request->get('tenhs');
        $mailbo=$request->get('mailbo');
        $mailme=$request->get('mailme');
        $mailph=$request->get('mailph');
        $details=[
            'tenhs'=>$tenhs,
        ];
        $mail=new TestMail($details);
        if ($status == 1) {
            Mail::to($mailbo)->send($mail);
            Mail::to($mailme)->send($mail);
        } else {
            Mail::to($mailph)->send($mail);
        }
    }
    public function successMail(Request $request)
    {
//        $status=$request->get('status');
        $id=$request->get('id');
        $hs=nknhaphoc::where('id','=',$id)->first()->toArray();
        $tenhs=$hs['tenhs'];
        $mailbo=$hs['emailbo'];
        $mailme=$hs['emailme'];
        $mailph=$hs['emailph'];
        $date = date('d-m-Y', strtotime("+1 day"));
        $details=[
            'tenhs'=>$tenhs,
            'day'=>$date
        ];
        $mail=new SuccessMail($details);
        if ($mailbo != null) {
            Mail::to($mailbo)->send($mail);
            Mail::to($mailme)->send($mail);
        } else {
            Mail::to($mailph)->send($mail);
        }
    }
    public function failMail(Request $request)
    {
//        $status=$request->get('status');
        $id=$request->get('id');
        $hs=nknhaphoc::where('id','=',$id)->first()->toArray();
        $tenhs=$hs['tenhs'];
        $mailbo=$hs['emailbo'];
        $mailme=$hs['emailme'];
        $mailph=$hs['emailph'];
        $date = date('d-m-Y', strtotime("+1 day"));
        $details=[
            'tenhs'=>$tenhs,
            'day'=>$date,
        ];
        $mail=new FailMail($details);
        if ($mailbo != null) {
            Mail::to($mailbo)->send($mail);
            Mail::to($mailme)->send($mail);
        } else {
            Mail::to($mailph)->send($mail);
        }
    }

}

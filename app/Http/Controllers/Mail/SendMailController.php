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
        $tenhs = $request->get('tenhs');
        $mailph = $request->get('mailph');
        $details = [
            'tenhs' => $tenhs,
        ];
        $mail = new TestMail($details);
        Mail::to($mailph)->send($mail);
    }

    public function successMail(Request $request)
    {
//        $status=$request->get('status');
        $id = $request->get('id');
        $hs = nknhaphoc::where('id', '=', $id)->first()->toArray();
        $tenhs = $hs['tenhs'];
        $mailph = $hs['emailph'];
        $date = date('d-m-Y', strtotime("+1 day"));
        $details = [
            'tenhs' => $tenhs,
            'day' => $date
        ];
        $mail = new SuccessMail($details);
        Mail::to($mailph)->send($mail);

    }

    public function failMail(Request $request)
    {
        $id = $request->get('id');
        $hs = nknhaphoc::where('id', '=', $id)->first()->toArray();
        $tenhs = $hs['tenhs'];
        $mailph = $hs['emailph'];
        $date = date('d-m-Y', strtotime("+1 day"));
        $details = [
            'tenhs' => $tenhs,
            'day' => $date,
        ];
        $mail = new FailMail($details);
        Mail::to($mailph)->send($mail);
    }

}

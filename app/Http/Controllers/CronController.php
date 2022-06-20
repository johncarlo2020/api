<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

use App\Mail\Cron;

class CronController extends Controller
{
    public function index()
    {
        $mailData = [
            'title' => 'CSAS1',
            'body' => 'you are now registered.'
        ];
         
        Mail::to('joshuacanilang3@gmail.com')->send(new Cron($mailData));
           
        dd("Email is sent successfully.");
    }
}

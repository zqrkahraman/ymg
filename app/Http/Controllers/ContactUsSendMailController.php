<?php

namespace App\Http\Controllers;

use App\Mail\ContactUs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactUsSendMailController extends Controller
{
    /**
     * Show a list of all of the application's users.
     *
     * @return \Illuminate\Http\Response
     */


    public function index(Request $request)
    { 
        Mail::to("ok@istanbulwelcomecard.com")->send(new ContactUs($request));
    }
}

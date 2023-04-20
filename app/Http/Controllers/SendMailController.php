<?php

namespace App\Http\Controllers;

use App\Models\EmailTemplates;
use App\Models\SentEmails;
use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;

class SendMailController extends Controller
{
    public function index()
    {
        // return Inertia::render('SendMail');
    }

    public function store()
    {
    }

    public function show(SentEmails $mail)
    {

        return Inertia::render('SendMail');
    }
}

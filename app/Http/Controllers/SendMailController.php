<?php

namespace App\Http\Controllers;

use App\Models\EmailTemplates;
use App\Models\User;
use App\Services\SendMailService;
use Illuminate\Http\Request;
use Inertia\Inertia;

class SendMailController extends Controller
{
    public function index()
    {
        // return Inertia::render('SendMail');
    }

    public function show(EmailTemplates $template)
    {
        $users = User::all();

        return Inertia::render('SendMail', [
            'template' => $template,
            'users' => $users
        ]);
    }

    public function store(EmailTemplates $template, Request $request)
    {
        $to = $request->input('to') ? User::find($request->input('to'))->name : '';
        $email = $request->input('to') ? User::find($request->input('to'))->email : '';
        $body = $request->input('body');
        $title = $request->input('title');

        $message = (new SendMailService)->assignKeys($to, $email, $body, $title);

        (new SendMailService)->sendMail($message['body'], $email, $message['title']);

        return Inertia::render('SendMail', [
            'template' => $template,
            'users' => User::all()
        ]);
    }
}

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
        $users = User::all();

        $body = (new SendMailService)->assignKeys($template, $request);

        return Inertia::render('SendMail', [
            'template' => $template,
            'users' => $users
        ]);
    }
}

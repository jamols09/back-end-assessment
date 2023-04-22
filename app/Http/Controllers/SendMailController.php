<?php

namespace App\Http\Controllers;

use App\Models\EmailTemplates;
use App\Models\User;
use App\Services\EmailAttachmentService;
use App\Services\SendMailService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Inertia\Inertia;

class SendMailController extends Controller
{
    public function index()
    {
        // return Inertia::render('SendMail');
    }

    public function show(EmailTemplates $template)
    {

        return Inertia::render('SendMail', [
            'template' => $template,
            'users' => User::all()
        ]);
    }

    public function store(EmailTemplates $template, Request $request)
    {
        $to = $request->input('to') ? User::find($request->input('to'))->name : '';
        $email = $request->input('to') ? User::find($request->input('to'))->email : '';
        $body = $request->input('body');
        $title = $request->input('title');
        $hashName = '';

        if ($request->file('file')) {
            $path = 'attachment/';
            $hashName = $request->file->hashName();
            (new EmailAttachmentService)->storeFile($hashName, $request, $path);
            (new EmailAttachmentService)->saveRecord($request->file('file')->getClientOriginalName(), $request->file->hashName(), $path);
        }

        $message = (new SendMailService)->assignKeys($to, $email, $body, $title);

        (new SendMailService)->sendMail($message['body'], $email, $message['title'], $hashName);

        (new SendMailService)->recordMail($message, $template->id, User::find($request->input('to'))->id);

        return Inertia::render('SendMail', [
            'template' => $template,
            'users' => User::all()
        ]);
    }
}

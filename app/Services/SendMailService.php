<?php

namespace App\Services;

use App\Mail\TemplatedMail;
use App\Models\EmailTemplates;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Inertia\Inertia;

class SendMailService
{

    private $replacements = array();

    public function assignKeys(EmailTemplates $template, Request $request)
    {
        $this->replacements['name'] = $request->input('to') ? User::find($request->input('to'))->name : '';
        $this->replacements['email'] = $request->input('to') ? User::find($request->input('to'))->email : '';

        $body = $template->body;

        foreach ($this->replacements as $key => $value) {
            $body = preg_replace('/\[' . $key . '\]/', $value, $body);
        }

        return $body;
    }

    public function sendMail(string $body, string $email, string $title)
    {
        Mail::to($email)->send(new TemplatedMail($body, $title));
    }
}

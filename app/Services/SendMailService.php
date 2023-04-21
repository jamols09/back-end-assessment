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

    public function assignKeys(string $to, string $email, string $_body, string $_title)
    {
        $this->replacements['name'] = $to;
        $this->replacements['email'] = $email;

        $body = $_body;
        $title = $_title;

        foreach ($this->replacements as $key => $value) {
            $body = preg_replace('/\[' . $key . '\]/', $value, $body);
        }

        foreach ($this->replacements as $key => $value) {
            $title = preg_replace('/\[' . $key . '\]/', $value, $title);
        }

        return ["body" => $body, "title" => $title];
    }

    public function sendMail(string $body, string $email, string $title)
    {
        Mail::to($email)->send(new TemplatedMail($body, $title));
    }
}

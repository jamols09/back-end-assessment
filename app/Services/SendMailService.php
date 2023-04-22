<?php

namespace App\Services;

use App\Mail\TemplatedMail;
use App\Models\SentEmails;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;

class SendMailService
{

    private $replacements = array();

    public function assignKeys(string $to, string $email, string $_body, string $_title): array
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

    public function sendMail(string $body, string $email, string $title, string $filename): void
    {
        Mail::to($email)->send(new TemplatedMail($body, $title, $filename));
    }

    public function recordMail(array $message, int $template_id, int $user_id): void
    {
        SentEmails::create([
            'user_id' => $user_id,
            'body' => $message['body'],
            'title' => $message['title'],
            'email_template_id' => $template_id,
            'send_datetime' => Carbon::now()
        ]);
    }
}

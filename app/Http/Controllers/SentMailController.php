<?php

namespace App\Http\Controllers;

use App\Models\SentEmails;
use Illuminate\Http\Request;
use Inertia\Inertia;

class SentMailController extends Controller
{
    public function index()
    {
        return Inertia::render('SentMail', [
            'mails' => SentEmails::all(),
        ]);
    }

    public function show(SentEmails $sent)
    {
        return Inertia::render('ViewSentMail', [
            'template' => $sent,
        ]);
    }
}

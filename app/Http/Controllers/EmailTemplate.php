<?php

namespace App\Http\Controllers;

use App\Models\EmailTemplates;
use Illuminate\Http\Request;
use Inertia\Inertia;

class EmailTemplate extends Controller
{
    public function index(Request $request)
    {
        return Inertia::render('CreateEmailTemplate');
    }

    public function show(Request $request)
    {
        return Inertia::render('ListEmailTemplate', [
            'email_templates' => EmailTemplates::all()
        ]);
    }

    public function store(Request $request)
    {
        EmailTemplates::create(
            $request->validate([
                'title' => ['required', 'max:20'],
                'body' => ['required', 'max:254'],
            ])
        );

        return to_route('template.index');
    }
}

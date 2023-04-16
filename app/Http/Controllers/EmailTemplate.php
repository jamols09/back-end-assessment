<?php

namespace App\Http\Controllers;

use App\Models\EmailTemplates;
use Illuminate\Http\Request;
use Inertia\Inertia;

class EmailTemplate extends Controller
{
    public function create()
    {
        return Inertia::render('CreateEmailTemplate');
    }

    public function index()
    {
        return Inertia::render('ListEmailTemplate', [
            'templates' => EmailTemplates::all()
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

    public function destroy(EmailTemplates $template)
    {
        $template->delete();
        return to_route('template.index');
    }

    public function show(EmailTemplates $template)
    {
        return Inertia::render('CreateEmailTemplate', [
            'template' => $template
        ]);
    }

    public function update(Request $request)
    {
        EmailTemplates::where('id', $request->template)->update([
            'title' => $request->get('title'),
            'body' => $request->get('body')
        ]);
    }
}

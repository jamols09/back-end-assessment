<?php

namespace App\Http\Controllers;

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
        return Inertia::render('ListEmailTemplate');
    }
}

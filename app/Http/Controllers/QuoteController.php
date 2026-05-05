<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Quote;
use Inertia\Inertia;

class QuoteController extends Controller
{
    public function home()
    {
        $quotes = Quote::with([
            'author',
            'user',
            'background',
            'emotions',
            'reactions',
        ])
        ->latest()
        ->get();

        return Inertia::render('Home', ['quotes' => $quotes]);
    }

    public function index()
    {
        $quotes = Quote::with([
            'author',
            'user',
            'background',
            'emotions',
            'reactions',
        ])
        ->latest()
        ->get();

        return Inertia::render('Quotes/Index', ['quotes' => $quotes]);
    }

    public function show($id)
    {
        $quote = Quote::with([
            'author',
            'user',
            'presetBackground',
            'emotions',
            'reactions'
        ])
        ->findorfail($id);

        if (!$quote) {
            abort(404);
        }

        return Inertia::render('Quote/Show', ['quote' => $quote]);
    }
}

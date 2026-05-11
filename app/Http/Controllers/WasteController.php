<?php

namespace App\Http\Controllers;

use App\Models\ImpactAction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class WasteController extends Controller
{
    public function index()
    {
        return view('home');
    }

    public function generate(Request $request)
    {
        $item = $request->input('item');
        $category = $request->input('category');

        $prompt = "You are a zero waste AI assistant.
        Item: $item.
        Category: $category.
        Give 3 simple ideas: reuse, recycle, eco tip.";

        $response = Http::post(
                'https://generativelanguage.googleapis.com/v1beta/models/gemini-2.5-flash:generateContent?key=' . env('GEMINI_API_KEY'),            [
                'contents' => [
                    [
                        'parts' => [
                            ['text' => $prompt]
                        ]
                    ]
                ]
            ]
        );

        if ($response->failed()) {
            $result = 'Gemini Error: '.$response->body();
        } else {
            $result = $response->json('candidates.0.content.parts.0.text');
        }

        if (is_string($result) && $result !== '' && ! str_starts_with($result, 'Gemini Error')) {
            ImpactAction::create([
                'user_id' => Auth::id(),
                'type' => 'assistant',
                'category' => $category ?: 'general',
                'waste_kg' => 0,
                'carbon_kg' => 0,
            ]);
        }

        return view('home', compact('item', 'category', 'result'));
    }
}
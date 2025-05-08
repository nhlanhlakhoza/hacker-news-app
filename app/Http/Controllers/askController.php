<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use App\Models\Ask;

class AskController extends Controller
{
    public function fetchAskStory()
    {
        $response = Http::get('https://hacker-news.firebaseio.com/v0/item/121003.json');

        if ($response->successful()) {
            $data = $response->json();

            Ask::updateOrCreate(
                ['hn_id' => $data['id']],
                [
                    'by' => $data['by'] ?? null,
                    'title' => $data['title'] ?? null,
                    'text' => $data['text'] ?? null,
                    'score' => $data['score'] ?? null,
                    'time' => $data['time'] ?? null,
                ]
            );

            return response()->json(['message' => 'Ask story saved successfully.']);
        }

        return response()->json(['error' => 'Failed to fetch data'], 500);
    }

    public function index()
{   $response = Http::get('https://hacker-news.firebaseio.com/v0/item/121003.json');

    if ($response->successful()) {
        $data = $response->json();

        Ask::updateOrCreate(
            ['hn_id' => $data['id']],
            [
                'by' => $data['by'] ?? null,
                'title' => $data['title'] ?? null,
                'text' => $data['text'] ?? null,
                'score' => $data['score'] ?? null,
                'time' => $data['time'] ?? null,
            ]
        );

    }
    $asks = Ask::latest()->get();
    return view('ask', compact('asks'));
}
}

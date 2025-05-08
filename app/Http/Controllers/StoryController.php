<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Story;
use App\Models\Comment;
use Illuminate\Support\Facades\Http;
use Carbon\Carbon;
class StoryController extends Controller
{
    // Store and display New Stories
    public function newStories()
    {
        // Fetch the story
        $response = Http::get('https://hacker-news.firebaseio.com/v0/item/8863.json?print=pretty');

        if ($response->successful()) {
            $data = $response->json();

            // Save to DB
            Story::updateOrCreate(
                ['hn_id' => $data['id']],
                [
                    'by' => $data['by'],
                    'title' => $data['title'],
                    'type' => $data['type'],
                    'url' => $data['url'] ?? null,
                    'score' => $data['score'] ?? null,
                    'descendants' => $data['descendants'] ?? null,
                    'kids' => isset($data['kids']) ? json_encode($data['kids']) : null,
                    'time' => Carbon::createFromTimestamp($data['time']),
                ]
            );
        }

        // Retrieve and display latest stories
        $stories = Story::orderByDesc('time')->limit(20)->get();
        return view('index', compact('stories'))->with('title', 'New Stories');
    }

   // Show PAST (top or best) stories
   public function pastStories()
   {
       $yesterday = \Carbon\Carbon::yesterday()->startOfDay();
   
       $stories = Story::where('time', '<', $yesterday)
                       ->orderByDesc('score')
                       ->limit(20)
                       ->get();
   
       return view('index', compact('stories'))->with('title', 'Past Stories');
   }

   // Show single story + comments
   public function show($hn_id)
   {
       $story = Story::where('hn_id', $hn_id)->firstOrFail();
       $comments = Comment::where('parent', $hn_id)->get();
       return view('show', compact('story', 'comments'));
   }
   public function comments()
   {
       // Fetch comment data from Hacker News API
       $data = Http::get('https://hacker-news.firebaseio.com/v0/item/2921983.json')->json();
   
       // Store or update the comment in the database
       Comment::updateOrCreate(
           ['hn_id' => $data['id']],
           [
               'by' => $data['by'] ?? null,
               'text' => $data['text'] ?? null,
               'parent' => $data['parent'],
               'kids' => isset($data['kids']) ? json_encode($data['kids']) : null,
               'time' => Carbon::createFromTimestamp($data['time']),
           ]
       );
   
       // Fetch latest 50 comments from DB for display
       $comments = Comment::orderBy('time', 'desc')->take(50)->get();
   
       // Return the view with the fetched comments
       return view('comments', compact('comments'));
   }
   
}

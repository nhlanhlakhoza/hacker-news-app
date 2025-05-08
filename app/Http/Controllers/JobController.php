<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use App\Models\Job;
use Illuminate\Http\Request;
use Carbon\Carbon;

class JobController extends Controller
{
    public function index()
    {
        // Get the list of job story IDs
        $jobIdsUrl = "https://hacker-news.firebaseio.com/v0/jobstories.json";
        $response = Http::get($jobIdsUrl);
    
        if ($response->ok()) {
            $jobIds = $response->json();
    
            // Limit number of jobs to fetch (optional, for performance)
            $jobIds = array_slice($jobIds, 0, 20);
    
            foreach ($jobIds as $jobId) {
                $url = "https://hacker-news.firebaseio.com/v0/item/{$jobId}.json";
                $jobResponse = Http::get($url);
    
                if ($jobResponse->ok()) {
                    $data = $jobResponse->json();
    
                    Job::updateOrCreate(
                        ['hn_id' => $data['id']],
                        [
                            'by' => $data['by'] ?? null,
                            'title' => $data['title'] ?? null,
                            'text' => $data['text'] ?? null,
                            'url' => $data['url'] ?? null,
                            'score' => $data['score'] ?? 0,
                            'time' => isset($data['time']) ? Carbon::createFromTimestamp($data['time']) : null,
                        ]
                    );
                }
            }
        }
    
        $jobs = Job::latest()->get();
    
        return view('jobs', compact('jobs'));
    }
    
}

<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Http;
use App\Models\Story;
use Carbon\Carbon;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/fetch-story', function () {
    $data = Http::get('https://hacker-news.firebaseio.com/v0/item/8863.json')->json();

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

    return 'Story saved to database.';
});

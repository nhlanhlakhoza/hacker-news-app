<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Http;
use App\Models\Story;
use App\Models\Comment;
use Carbon\Carbon;
use App\Http\Controllers\StoryController;
use App\Http\Controllers\AskController;

use App\Http\Controllers\JobController;
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

/*Route::get('/fetch-story', function () {
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

Route::get('/fetch-comment', function () {
    $data = Http::get('https://hacker-news.firebaseio.com/v0/item/2921983.json')->json();

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

    return 'Comment saved!';
});*/
Route::get('/stories', [StoryController::class, 'index'])->name('stories.index');
Route::get('/stories/{hn_id}', [StoryController::class, 'show'])->name('stories.show');


Route::get('/', [StoryController::class, 'newStories'])->name('stories.new');
Route::get('/past', [StoryController::class, 'pastStories'])->name('stories.past');
Route::get('/story/{hn_id}', [StoryController::class, 'show'])->name('stories.show');
Route::get('/comments', [StoryController::class, 'comments'])->name('stories.comments');
Route::get('/fetch-ask', [AskController::class, 'fetchAskStory']);
Route::get('/ask', [AskController::class, 'index'])->name('stories.ask');
Route::get('/jobs', [JobController::class, 'index'])->name('stories.jobs');

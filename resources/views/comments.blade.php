@extends('layouts.app')

@section('content')
    <h2 class="text-center">Latest Comments</h2>

    @forelse ($comments as $comment)
        <div class="comment-box mt-3">
        <strong> {{ $comment->by }}| {{ $comment->time }}</strong>

            <div>{!! $comment->text !!}</div>
        </div>
    @empty
        <p class="text-muted text-center mt-4">No comments available.</p>
    @endforelse
@endsection

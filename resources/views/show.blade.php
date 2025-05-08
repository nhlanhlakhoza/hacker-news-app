@extends('layouts.app')

@section('content')
    <a href="{{ url()->previous() }}" class="btn btn-sm btn-outline-secondary mb-3">&larr; Back</a>

    <div class="mb-4">
        <h3 class="mb-1">{{ $story->title }}</h3>
        <p class="mb-0 text-muted">By {{ $story->by }} | Score: {{ $story->score }}</p>
        <a href="{{ $story->url }}" class="btn btn-link p-0" target="_blank">Read full article</a>
    </div>

    <h5 class="mt-4">Comments</h5>
    @if($comments->isEmpty())
        <p class="text-muted">No comments yet.</p>
    @else
        @foreach($comments as $comment)
            <div class="comment-box">
                <strong>{{ $comment->by }}</strong>
                <div>{!! $comment->text !!}</div>
            </div>
        @endforeach
    @endif
@endsection

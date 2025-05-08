@extends('layouts.app')

@section('content')
    <h2 class="text-center">{{ $title ?? 'Stories' }}</h2>

    <ul class="list-group mt-4">
        @foreach($stories as $story)
            <li class="list-group-item d-flex justify-content-between align-items-start flex-column">
            <div class="story-title">
                    <a  style="color: black;" href="{{ route('stories.show', $story->hn_id) }}">{{ $story->title }} ></a>
                </div>
                <small class="text-muted">By {{ $story->by }} | Score: {{ $story->score }}</small>
            </li>
        @endforeach
    </ul>
@endsection

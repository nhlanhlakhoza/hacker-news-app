@extends('layouts.app')

@section('content')
    <div class="container">
        <h2 class="text-center mb-4">Ask HN Stories</h2>

        @foreach ($asks as $ask)
            <div class="card mb-3">
                <div class="card-body">
                    <h5 class="card-title">{{ $ask->title }}</h5>
                    <p class="card-text">{!! $ask->text !!}</p>
                    <small class="text-muted">By {{ $ask->by }} | Score: {{ $ask->score }} | {{ \Carbon\Carbon::createFromTimestamp($ask->time)->diffForHumans() }}</small>
                </div>
            </div>
        @endforeach
    </div>
@endsection

@extends('layouts.app')

@section('content')
<div class="container mt-5 text-center">
    <h2 class="mb-4">Job Posts from Hacker News</h2>

    @foreach($jobs as $job)
        <div class="card mb-3 mx-auto" style="max-width: 700px;">
            <div class="card-body">
                <h5 class="card-title">{{ $job->title }}</h5>
                <p class="card-text">{{ $job->text }}</p>
                <a href="{{ $job->url }}" target="_blank" class="btn btn-sm btn-primary">Read More</a>
                <p class="text-muted mt-2">Posted by {{ $job->by }} at {{ $job->time->format('Y-m-d H:i') }}</p>
            </div>
        </div>
    @endforeach
</div>
@endsection

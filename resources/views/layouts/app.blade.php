<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Hacker News Viewer</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .container {
            max-width: 800px;
            margin-top: 40px;
        }
        .story-title {
            font-weight: bold;
            font-size: 1.2rem;
        }
        .nav-link {
            margin-right: 15px;
        }
        .comment-box {
            border-left: 3px solid #dee2e6;
            padding-left: 15px;
            margin-bottom: 1rem;
            background-color: #fff;
            border-radius: 5px;
            padding: 10px;
        }
    </style>
</head>
<body>
    <div class="container bg-white shadow rounded p-4">
        <h1 class="text-center mb-4">Hacker News</h1>

        <nav class="d-flex justify-content-center mb-4">
            <a href="{{ route('stories.new') }}" class="nav-link btn btn-outline-secondary {{ request()->routeIs('stories.new') ? 'active' : '' }}">New</a>
            <a href="{{ route('stories.past') }}" class="nav-link btn btn-outline-secondary {{ request()->routeIs('stories.past') ? 'active' : '' }}">Past</a>
            <a href="{{ route('stories.comments') }}" class="nav-link btn btn-outline-secondary {{ request()->routeIs('stories.comments') ? 'active' : '' }}">Comments</a>
            <a href="{{ route('stories.ask') }}" class="nav-link btn btn-outline-secondary {{ request()->routeIs('stories.ask') ? 'active' : '' }}">Ask</a>
            <a href="{{ route('stories.jobs') }}" class="nav-link btn btn-outline-secondary {{ request()->routeIs('stories.jobs') ? 'active' : '' }}">Jobs</a>

        </nav>

        @yield('content')
    </div>
</body>
</html>

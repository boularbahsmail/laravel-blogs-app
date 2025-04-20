@extends('layout.app')

@section('title', 'Blogs')

@section('content')
<div class="container mt-4">
    <h1>Tous les articles</h1>

    @if ($request->query('category'))
    <div class="row mt-4">
        @foreach($blogs as $blog)
        @if($blog['category'] == $request->query('category'))
        <div class="col-md-4 mb-3">
            <div class="card h-100">
                <div class="card-body">
                    <b class="bg-danger text-white py-1 px-2 rounded">{{ $blog['category'] }}</b>
                    <h4 class="card-title mt-2">{{ $blog['title'] }}</h3>
                        <h6 class="text-secondary">
                            <b>{{ $blog['author'] }}</b> - <b>{{ $blog['published_at'] }}</b>
                        </h6>
                        <div class="mt-2">
                            @foreach($blog['tags'] as $tag)
                            <span class="badge {{ $loop->first ? 'bg-primary text-decoration-underline' : 'bg-secondary' }}">{{ $tag }}</span>
                            @endforeach
                        </div>
                        <p class="card-text mt-2">{{ Str::limit($blog['content'], 150, '...') }}</p>
                </div>
                <div class="card-footer p-3">
                    <a href="{{ route('blogs.show', ['blog' => $blog['slug']]) }}" class="btn btn-primary">Lire l'article</a>
                </div>
            </div>
        </div>
        @endif
        @endforeach
    </div>
    @else
    <div class="row mt-4">
        @foreach($blogs as $blog)
        <div class="col-md-4 mb-3">
            <div class="card h-100">
                <div class="card-body">
                    <h4 class="card-title">{{ $blog['title'] }}</h3>
                        <h6 class="text-secondary">
                            <b>{{ $blog['author'] }}</b> - <b>{{ $blog['published_at'] }}</b>
                        </h6>
                        <div class="mt-2">
                            @foreach($blog['tags'] as $tag)
                            <span class="badge {{ $loop->first ? 'bg-primary text-decoration-underline' : 'bg-secondary' }}">{{ $tag }}</span>
                            @endforeach
                        </div>
                        <p class="card-text mt-2">{{ Str::limit($blog['content'], 150, '...') }}</p>
                </div>
                <div class="card-footer p-3">
                    <a href="{{ route('blogs.show', ['blog' => $blog['slug']]) }}" class="btn btn-primary">Lire l'article</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    @endif

</div>
@endsection
@extends("layout.app")
@section('title', 'Blog')
@section('content')
<div>
    <div class="container py-5">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Articles</a></li>
                <li class="breadcrumb-item"><a href="/?category={{ $blog['category'] }}">{{$blog['category']}}</a></li>
                <li class="breadcrumb-item text-secondary">{{$blog['title']}}</li>
            </ol>
        </nav>

        <div class="card p-3">
            <h1>{{ $blog['title'] }}</h1>
            <h6 class="text-secondary">
                <b>{{ $blog['author'] }}</b> - <b>{{ $blog['published_at'] }}</b>
            </h6>
            <div class="mt-2">
                @foreach($blog['tags'] as $tag)
                <span class="badge {{ $loop->first ? 'bg-primary text-decoration-underline' : 'bg-secondary' }}">{{ $tag }}</span>
                @endforeach
            </div>            
            <p class="card-text mt-3">{{ $blog['content'] }}</h6>
        </div>

        <div class="d-flex justify-content-between mt-4">
            <a href="/" class="btn btn-outline-primary">
                <-Retour aux articles
            </a>

            <a href="/admin/articles/view/{{ $blog['slug'] }}?admin=1" class="btn btn-outline-secondary">
                Vue admin
            </a>
        </div>
    </div>

</div>
@endsection
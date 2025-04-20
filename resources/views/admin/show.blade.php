@extends("layout.admin")
@section("content")
<div class="container">
    <div class="d-flex justify-content-between">
        <h2>Article #{{ $blog['id'] }}</h2>

        <div>
            <a href="/admin/articles/edit/{{ $blog['slug'] }}?admin=1" class="btn btn-warning btn-sm">Modifier</a>
            <a href="{{ route('blogs.show', ['blog' => $blog['slug']]) }}" class="btn btn-primary btn-sm">Voir sur le site</a>
        </div>
    </div>
    <hr />

    <div class="card">
        <div class="card-header bg-primary">
            <b class="text-white">Details de l'article</b>
        </div>
        <div class="card-body">
            <h3 class="card-title mb-3">{{ $blog['title'] }}</h3>
            <h6 class="text-secondary mb-3">
                <b>{{ $blog['author'] }}</b> - <b>{{ $blog['published_at'] }}</b>
            </h6>

            <div class="mb-3">
                <b>Categorie: </b> <span class="badge bg-primary">
                    {{ $blog['category'] }}
                </span>
            </div>

            <div class="mb-3 d-flex align-items-center gap-2">
                <b>Tags:</b>
                <div>
                    @foreach($blog['tags'] as $tag)
                    <span class="badge bg-secondary">{{ $tag }}</span>
                    @endforeach
                </div>
            </div>

            <div class="mb-3">
                <b>Slug: </b> <span>
                    {{ $blog['slug'] }}
                </span>
            </div>

            <div class="mb-3">
                <b>Resume: </b>
                <br />
                <span>
                    {{ $blog['summary'] }}
                </span>
            </div>

            <div class="mt-5">
                <h5><b>Contenu de l'article: </b></h5>
                <!-- <p class="card-text bg-secondary">{{ $blog['content'] }}</p> -->
                <div class="alert alert-secondary" role="alert">
                    {{ $blog['content'] }}
                </div>
            </div>
        </div>
    </div>

    <a href="/admin/dashboard?admin=1" class="btn btn-outline-primary mt-4">
        <- Retour a la liste
            </a>
</div>
@endsection
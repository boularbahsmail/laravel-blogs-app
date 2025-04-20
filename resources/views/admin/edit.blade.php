@extends("layout.admin")
@section("content")
<div class="container mb-5">
    <div>
        <h2>Modifier l'article #{{ $blog['id'] }}</h2>
    </div>
    <hr />

    <div class="card">
        <div class="card-header bg-primary">
            <b class="text-white">Formulaire d'edition</b>
        </div>

        <div class="card-body">
            <div class="input mb-3">
                <label class="form-label"><b>Title</b></label>
                <input type="text" class="form-control" value="{{ $blog['title'] }}" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" readonly>
            </div>

            <div class="input mb-3">
                <label class="form-label"><b>Auteur</b></label>
                <input type="text" class="form-control" value="{{ $blog['author'] }}" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" readonly>
            </div>

            <div class="input mb-3">
                <label class="form-label"><b>Categorie</b></label>
                <select class="form-select" aria-label="Default select example">
                    @foreach($categories as $category)
                    <option
                        value="{{ $category }}"
                        {{ $blog['category'] == $category ? 'selected' : '' }} disabled>
                        {{ $category }}
                    </option>
                    @endforeach
                </select>
            </div>

            <div class="input mb-3">
                <label class="form-label"><b>Date de publication</b></label>
                <input type="date" class="form-control" value="{{ $blog['published_at'] }}" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" readonly>
            </div>

            <div class="input mb-3">
                <label class="form-label"><b>Resume</b></label>
                <textarea class="form-control" rows="2" readonly>{{ $blog['summary'] }}</textarea>
            </div>

            <div class="input mb-3">
                <label class="form-label"><b>Contenu</b></label>
                <textarea class="form-control" rows="12" readonly>{{ $blog['content'] }}</textarea>
            </div>

            <div class="mb-3">
                <b>Tags:</b>
                <br />
                <div class="d-flex flex-wrap gap-2 mt-3">
                    @foreach($tags as $tag)
                    <div>
                        <input type="checkbox" id="{{ $tag }}" name="tags[]" value="{{ $tag }}"
                            {{ in_array($tag, $blog['tags']) ? 'checked' : '' }} disabled>
                        <label for="{{ $tag }}">{{ $tag }}</label>
                    </div>
                    @endforeach
                </div>
            </div>

            <div class="alert alert-info" role="alert">
                <b>Note</b> - Dans cette version du blog, les articles sont en lecture seule car il sont stockes en memoire.
            </div>

            <div class="d-flex justify-content-between nt-4">
                <a href="/admin/articles/view/{{ $blog['slug'] }}?admin=1" class="btn btn-outline-primary">
                    <- Retour aux details
                        </a>

                <a href="/admin/dashboard?admin=1" class="btn btn-primary">
                    <- Retour a la liste
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
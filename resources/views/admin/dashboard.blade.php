@extends("layout.admin")
@section("content")
<div class="container mt-4">
    <h1>Gestion des articles</h1>
    <hr />
    <table class="table table-striped align-middle">
        <thead class="table-light">
            <tr>
                <th>ID</th>
                <th>Titre</th>
                <th>Auteur</th>
                <th>Catégorie</th>
                <th>Date de publication</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($blogs as $blog)
            <tr>
                <td>{{ $blog['id'] }}</td>
                <td>{{ $blog['title'] }}</td>
                <td>{{ $blog['author'] }}</td>
                <td><span class="badge bg-primary">{{ $blog['category'] }}</span></td>
                <td>{{ $blog['published_at'] }}</td>
                <td>
                    <a href="/admin/articles/view/{{ $blog['slug'] }}?admin=1" class="btn btn-info btn-sm">Voir</a>
                    <a href="#" class="btn btn-warning btn-sm">Modifier</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
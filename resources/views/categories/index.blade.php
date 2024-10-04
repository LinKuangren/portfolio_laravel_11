@extends('layout.base')

@section('title', 'Toutes les catégories')
@section('description', 'Page de toutes les catégories.')

@section('content')
    <h1 class="text-3xl font-bold">Catégories :</h1>
    <div class="flex my-4">
        <a class="ml-2 px-5 py-3 bg-blue-800 text-white rounded-sm" href="{{ route('categories.add') }}">Créer une catégorie</a>
    </div>
    <div>
        @foreach ($categories as $categorie)
            <article>
                <h3 class="text-3xl"><a href="{{ route('categories.show', ['name' => $categorie->name, 'categorie' => $categorie->id])}}">{{ $categorie->name }}</a></h3>
                <div class="flex mt-4">
                    <a class="mr-2 px-5 py-3 bg-orange-600 text-white rounded-sm" href="{{ route('categories.edit', ['categorie' => $categorie->id]) }}">Modifier</a>
                    <form type="submit" action="{{ route('categories.delete', $categorie->id) }}" method="post" onsubmit="return confirm('tu veux vraiment supprimer ?')">
                        @csrf
                        @method('DELETE')
                        <button class="ml-2 px-5 py-3 bg-red-600 text-white rounded-sm" type="submit">Supprimer</button>
                    </form>
                </div>
            </article>
        @endforeach
        {{ $categories->links('pagination::tailwind') }}
    </div>
@endsection
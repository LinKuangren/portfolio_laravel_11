@extends('layout.base')

@section('title', 'Toutes les compétences')

@section('content')
    <h1 class="text-3xl font-bold">Compétences :</h1>
    <div class="flex my-4">
        <a class="ml-2 px-5 py-3 bg-blue-800 text-white rounded-sm" href="{{ route('skills.add') }}">Créer une catégorie</a>
    </div>
    <div>
        @foreach ($skills as $skill)
            <article>
                <h3 class="text-3xl">{{ $skill->name }}</h3>
                <p>{{ $skill->level }} ans</p>
                <div class="flex mt-4">
                    <a class="mr-2 px-5 py-3 bg-orange-600 text-white rounded-sm" href="{{ route('skills.edit', ['skill' => $skill->id]) }}">Modifier</a>
                    <form type="submit" action="{{ route('skills.delete', $skill->id) }}" method="post" onsubmit="return confirm('tu veux vraiment supprimer ?')">
                        @csrf
                        @method('DELETE')
                        <button class="ml-2 px-5 py-3 bg-red-600 text-white rounded-sm" type="submit">Supprimer</button>
                    </form>
                </div>
            </article>
        @endforeach
        {{ $skills->links('pagination::tailwind') }}
    </div>
@endsection
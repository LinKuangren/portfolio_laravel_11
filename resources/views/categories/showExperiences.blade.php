@extends('layout.base')

@section('title', $categorie->name)
@section('description', 'Page d\'une catégorie connecté aux réalisations.')

@section('content')
    <h1 class="text-4xl text-center mt-6 mb-3"><strong>Categorie : </strong> {{ $categorie->name }}</h1>
    <div class="sm:flex grid gap-4 my-4 justify-center">
        <a class="ml-2 px-5 py-3 text-center bg-blue-800 text-white rounded-sm hover:bg-blue-500" href="{{ route('categories.showProductions', ['name' => $categorie->name, 'categorie' => $categorie->id])}}">Réalisations</a>
        <a class="ml-2 px-5 py-3 text-center bg-blue-500 text-white rounded-sm hover:bg-blue-500" href="{{ route('categories.showExperiences', ['name' => $categorie->name, 'categorie' => $categorie->id])}}">Expériences pro</a>
    </div>
    @if ($categorie->experiences->isEmpty())
        <div>
            <h3 class="text-2xl font-bold text-start mt-6 mb-3">Expériences :</h3>
            <p>Aucune experiences pro</p>
        </div>
    @else
        <div>
            <h3 class="text-2xl font-bold text-start mt-6 mb-3">Expériences :</h3>
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 px-4 py-4">
                @foreach ($experiences as $experience)
                    <a href="{{ route('experiences.show', ['experience' => $experience->id, 'slug' => $experience->slug]) }}">
                        <article class="w-full min-h-28 content-center bg-emerald-200 border-emerald-300 hover:bg-emerald-300 rounded-md shadow-md">
                            <img class="w-full rounded-t-md" src="{{ $experience->imageUrl() }}" alt="{{ $experience->image}}">
                            <h3 class="text-center text-xl py-2">{{ $experience->title }}</h3>
                        </article>
                    </a>
                @endforeach
            </div>
            {{ $experiences->links('pagination::tailwind') }}
        </div>
    @endif
@endsection
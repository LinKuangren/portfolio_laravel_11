@extends('layout.base')

@section('title', $categorie->name)
@section('description', 'Page d\'une catégorie connecté aux réalisations.')

@section('content')
    <h1 class="text-4xl font-bold text-center mt-6 mb-3">Categorie : {{ $categorie->name }}</h1>
    <div class="flex my-4 justify-center">
        <a class="ml-2 px-5 py-3 bg-blue-800 text-white rounded-sm hover:bg-blue-500" href="{{ route('categories.showProductions', ['name' => $categorie->name, 'categorie' => $categorie->id])}}">Réalisations</a>
        <a class="ml-2 px-5 py-3 bg-blue-800 text-white rounded-sm hover:bg-blue-500" href="{{ route('categories.showExperiences', ['name' => $categorie->name, 'categorie' => $categorie->id])}}">Expériences pro</a>
    </div>
    @if ($categorie->experiences->isEmpty())
        <div>
            <h3 class="text-2xl font-bold text-start mt-6 mb-3">Expériences :</h3>
            <p>Aucune experiences pro</p>
        </div>
    @else
        <div>
            <h3 class="text-2xl font-bold text-start mt-6 mb-3">Expériences :</h3>
            <div class="grid grid-cols-3 xl:grid-cols-3 gap-4 px-4 py-4">
                @foreach ($experiences as $experience)
                    <article>
                        <img src="{{ $experience->imageUrl() }}" alt="{{ $experience->image }}">
                        <span>{{ $experience->title }}</span>
                    </article>
                @endforeach
            </div>
            {{ $experiences->links('pagination::tailwind') }}
        </div>
    @endif
@endsection
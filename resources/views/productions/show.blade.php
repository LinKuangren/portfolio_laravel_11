@extends('layout.base')

@section('title', $production->title)
@section('description', 'Page d\'information sur une réalisation.')

@section('content')
    <h1 class="text-4xl font-bold text-center mt-6 mb-3">{{ $production->title }}</h1>
    <div class="grid">
        <div class="grid justify-center">
            <img class="w-auto max-w-lg" src="{{ $production->imageUrl() }}" alt="{{ $production->image }}">
            @if ($production->url !== null)
                <div class="flex mt-2 py-1 justify-center">
                    <a class="px-8 py-4 sm:px-5 sm:py-2 text-center bg-blue-800 text-white rounded-sm hover:bg-blue-500" href="{{ $production->url }}">Voir site</a>
                </div>
            @endif
        </div>
        <div class="grid content-around sm:ml-4 w-96">
            @if ($production->categories->isEmpty())
                <div class="mt-3 mb-3">
                    <h3 class="mb-1 font-bold">Catégories</h3>
                    <p>Aucune catégorie</p>
                </div>
            @else
                <div class="mt-3 mb-3">
                    <h3 class="mb-1 font-bold">Catégories</h3>
                    <div class="gap-1 flex">
                        @foreach ($production->categories as $categorie)
                            <a class="py-1 px-5 text-white rounded-3xl bg-gray-600 hover:bg-gray-500" href="{{ route('categories.showProductions', ['categorie' => $categorie->id, 'name' => $categorie->name]) }}">
                                <small>{{ $categorie->name }}</small>
                            </a>
                        @endforeach
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection
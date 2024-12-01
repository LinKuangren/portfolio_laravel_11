@extends('layout.base')

@section('title', $experience->title)
@section('description', 'Page d\'information sur une expériences pro.')

@section('content')
    <h1 class="text-4xl font-bold text-center mt-6 mb-3">{{ $experience->title }}</h1>
    <div class="grid sm:flex justify-center">
        <img class="w-96" src="{{ $experience->imageUrl() }}" alt="{{ $experience->image }}">
        <div class="grid content-around sm:ml-4 w-96">
            <div class="mt-3">
                <h3 class="mb-1 font-bold">Entreprise :</h3>
                <p class="h-10 p-2 bg-emerald-400 rounded-sm">{{ $experience->company }}</p>
            </div>
            <div class="mt-3">
                <h3 class="mb-1 font-bold">Durée :</h3>
                <p class="h-10 p-2 bg-emerald-400 rounded-sm">{{ $experience->time }}</p>
            </div>
            @if ($experience->categories->isEmpty())
                <div class="mt-3 mb-3">
                    <h3 class="mb-1 font-bold">Catégories :</h3>
                    <p>Aucune catégorie</p>
                </div>
            @else
                <div class="mt-3 mb-3">
                    <h3 class="mb-1 font-bold">Catégories :</h3>
                    <div class="gap-1 flex flex-wrap">
                        @foreach ($experience->categories as $categorie)
                            <a class="py-1 px-5 text-white rounded-3xl bg-gray-600 hover:bg-gray-500" href="{{ route('categories.showProductions', ['categorie' => $categorie->id, 'name' => $categorie->name]) }}">
                                <small>{{ $categorie->name }}</small>
                            </a>
                        @endforeach
                    </div>
                </div>
            @endif
        </div>
    </div>
    <div class="mt-4 mb-28">
        <p class="p-2 bg-emerald-400 rounded-sm">{{ $experience->content }}</p>
    </div>
@endsection
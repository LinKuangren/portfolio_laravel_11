@extends('layout.base')

@section('title', $categorie->name)
@section('description', 'Page d\'une catégorie connecté aux réalisations.')

@section('content')
    <h1>{{ $categorie->name }}</h1>
    <div class="flex my-4">
        <a class="ml-2 px-5 py-3 bg-blue-800 text-white rounded-sm hover:bg-blue-500" href="{{ route('categories.showProductions', ['name' => $categorie->name, 'categorie' => $categorie->id])}}">Réalisations</a>
        <a class="ml-2 px-5 py-3 bg-blue-800 text-white rounded-sm hover:bg-blue-500" href="{{ route('categories.showExperiences', ['name' => $categorie->name, 'categorie' => $categorie->id])}}">Expériences pro</a>
    </div>
    @if ($categorie->productions->isEmpty())
        <div>
            <h3>Réalisations :</h3>
            <p>Aucune productions</p>
        </div>
    @else
        <div>
            <h3>Réalisations :</h3>
            @foreach ($productions as $production)
                <span>{{ $production->title }}</span>
            @endforeach
            {{ $productions->links('pagination::tailwind') }}
        </div>
    @endif
@endsection
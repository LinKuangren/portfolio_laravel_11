@extends('layout.base')

@section('title', $production->title)
@section('description', 'Page d\'information sur une réalisation.')

@section('content')
    <img class="h-32" src="{{ $production->imageUrl() }}" alt="{{ $production->image }}">
    <h1>{{ $production->title }}</h1>
    <p>{{ $production->content }}</p>
    @if ($production->categories->isEmpty())
        <div>
            <h3>Catégories :</h3>
            <p>Aucune catégorie</p>
        </div>
    @else
        <div>
            <h3>Catégories :</h3>
            @foreach ($production->categories as $categorie)
                <a class="hover:text-sky-600" href="{{ route('categories.showProductions', ['name' => $categorie->name, 'categorie' => $categorie->id])}}">{{ $categorie->name }}</a>
            @endforeach
        </div>
    @endif
@endsection
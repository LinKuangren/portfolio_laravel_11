@extends('layout.base')

@section('title', $experience->title)
@section('description', 'Page d\'information sur une expériences pro.')

@section('content')
    <img class="h-32" src="{{ $experience->imageUrl() }}" alt="{{ $experience->image }}">
    <h1>{{ $experience->title }}</h1>
    <p>{{ $experience->company }}</p>
    <p>{{ $experience->time }}</p>
    <p>{{ $experience->content }}</p>
    @if ($experience->categories->isEmpty())
        <div>
            <h3>Catégories :</h3>
            <p>Aucune catégorie</p>
        </div>
    @else
        <div>
            <h3>Catégories :</h3>
            @foreach ($experience->categories as $categorie)
                <a class="hover:text-sky-600" href="{{ route('categories.showExperiences', ['name' => $categorie->name, 'categorie' => $categorie->id])}}">{{ $categorie->name }}</a>
            @endforeach
        </div>
    @endif
@endsection
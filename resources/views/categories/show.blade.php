@extends('layout.base')

@section('title', $categorie->name)
@section('description', 'Page d\'une catégorie connecté aux réalisations.')

@section('content')
    <h1>{{ $categorie->name }}</h1>
@endsection
@extends('layout.base')

@section('title', 'Création d\'une categorie')
@section('description', 'Page pour ajouter une catégorie.')

@section('content')
    <h1 class="text-4xl font-bold text-center mt-6 mb-3">Créer une categorie</h1>
    @include('categories.form')
@endsection
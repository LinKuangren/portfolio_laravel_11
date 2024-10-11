@extends('layout.base')

@section('title', 'Modification d\une categorie' )
@section('description', 'Page pour modifier une catégorie.')

@section('content')
    <h1 class="text-4xl text-center mt-6 mb-3"><strong>Modifier la categorie :</strong> {{ $categorie->name }}</h1>
    @include('categories.form')
@endsection
@extends('layout.admin.base_admin')

@section('title', 'Modification d\une categorie' )
@section('description', 'Page pour modifier une catégorie.')

@section('content')
    <h1 class="text-4xl font-bold text-center mt-6 mb-3">Modifier la categorie: {{ $categorie->name }}</h1>
    @include('categories.form')
@endsection
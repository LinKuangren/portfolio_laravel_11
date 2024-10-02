@extends('layout.admin.base_admin')

@section('title', 'Création d\'une categorie')

@section('content')
    <h1>Créer une categorie</h1>
    @include('categories.form')
@endsection
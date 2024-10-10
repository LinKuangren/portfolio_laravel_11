@extends('layout.admin.base_admin')

@section('title', 'Création d\'une réalisation')
@section('description', 'Page pour ajouter une réalisation.')

@section('content')
    <h1 class="text-4xl font-bold text-center mt-6 mb-3">Créer une réalisation</h1>
    @include('productions.form')
@endsection
@extends('layout.base')

@section('title', 'Création d\'un diplôme')
@section('description', 'Page pour ajouter un diplôme.')

@section('content')
    <h1 class="text-4xl font-bold text-center mt-6 mb-3">Créer un diplôme</h1>
    @include('certifications.form')
@endsection
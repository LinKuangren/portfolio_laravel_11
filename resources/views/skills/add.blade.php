@extends('layout.admin.base_admin')

@section('title', 'Création d\'une compétence')
@section('description', 'Page pour ajouter une compétence.')

@section('content')
    <h1 class="text-4xl font-bold text-center mt-6 mb-3">Créer une compétence</h1>
    @include('skills.form')
@endsection
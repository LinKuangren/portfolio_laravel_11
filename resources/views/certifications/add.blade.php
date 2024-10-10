@extends('layout.admin.base_admin')

@section('title', 'Création d\'une certification')
@section('description', 'Page pour ajouter une certification.')

@section('content')
    <h1 class="text-4xl font-bold text-center mt-6 mb-3">Créer une certification</h1>
    @include('certifications.form')
@endsection
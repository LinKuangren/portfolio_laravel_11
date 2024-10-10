@extends('layout.admin.base_admin')

@section('title', 'Création d\'une experience pro')
@section('description', 'Page pour ajouter une expérience pro.')

@section('content')
    <h1 class="text-4xl font-bold text-center mt-6 mb-3">Créer une experience pro</h1>
    @include('experiences.form')
@endsection
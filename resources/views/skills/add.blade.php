@extends('layout.admin.base_admin')

@section('title', 'Création d\'une compétence')
@section('description', 'Page pour ajouter une compétence.')

@section('content')
    <h1>Créer une compétence</h1>
    @include('skills.form')
@endsection
@extends('layout.base')

@section('title', 'Modification d\un diplôme' )
@section('description', 'Page pour modifier un diplôme.')

@section('content')
    <h1 class="text-4xl font-bold text-center mt-6 mb-3">Modifier le diplôme: {{ $certification->name }}</h1>
    @include('certifications.form')
@endsection
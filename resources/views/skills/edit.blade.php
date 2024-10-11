@extends('layout.base')

@section('title', 'Modification d\une compétence' )
@section('description', 'Page pour modifier une compétence.')

@section('content')
    <h1 class="text-4xl font-bold text-center mt-6 mb-3">Modifier la compétence: {{ $skill->name }}</h1>
    @include('skills.form')
@endsection
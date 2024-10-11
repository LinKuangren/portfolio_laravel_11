@extends('layout.base')

@section('title', 'Modification d\une expérience pro' )
@section('description', 'Page pour modifier une expérience pro.')

@section('content')
    <h1 class="text-4xl font-bold text-center mt-6 mb-3">Modifier l' expérience pro: {{ $experience->name }}</h1>
    @include('experiences.form')
@endsection
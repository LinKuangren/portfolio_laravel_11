@extends('layout.base')

@section('title', 'Modification d\une réalisation' )
@section('description', 'Page pour modifier une réalisation.')

@section('content')
    <h1 class="text-4xl font-bold text-center mt-6 mb-3">Modifier la réalisation: {{ $production->name }}</h1>
    @include('productions.form')
@endsection
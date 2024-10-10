@extends('layout.admin.base_admin')

@section('title', 'Modification d\une certification' )
@section('description', 'Page pour modifier une certification.')

@section('content')
    <h1 class="text-4xl font-bold text-center mt-6 mb-3">Modifier la certification: {{ $certification->name }}</h1>
    @include('certifications.form')
@endsection
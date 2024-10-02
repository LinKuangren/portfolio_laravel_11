@extends('layout.admin.base_admin')

@section('title', 'Modification d\une certification' )

@section('content')
    <h1>Modifier la certification: {{ $certification->name }}</h1>
    @include('certifications.form')
@endsection
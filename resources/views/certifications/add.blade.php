@extends('layout.admin.base_admin')

@section('title', 'Création d\'une certification')

@section('content')
    <h1>Créer une certification</h1>
    @include('certifications.form')
@endsection
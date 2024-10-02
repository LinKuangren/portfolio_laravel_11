@extends('layout.admin.base_admin')

@section('title', 'Modification d\une categorie' )

@section('content')
    <h1>Modifier la categorie: {{ $categorie->name }}</h1>
    @include('categories.form')
@endsection
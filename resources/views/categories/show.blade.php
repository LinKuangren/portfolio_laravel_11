@extends('layout.base')

@section('title', $categorie->name)

@section('content')
    <h1>{{ categorie.name }}</h1>
@endsection
@extends('layout.admin.base_admin')

@section('title', 'Modification d\une réalisation' )
@section('description', 'Page pour modifier une réalisation.')

@section('content')
    <h1>Modifier la réalisation: {{ $production->name }}</h1>
    @include('productions.form')
@endsection
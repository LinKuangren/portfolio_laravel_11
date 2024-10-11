@extends('layout.base')

@section('title', 'Page d\'inscription')
@section('description', 'Page d\'inscription.')

@section('content')
    <h1>Profil {{ $user->name }}</h1>
@endsection
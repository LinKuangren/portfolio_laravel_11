@extends('layout.base')

@section('title', $production->title)
@section('description', 'Page d\'information sur une réalisation.')

@section('content')
    <img class="h-32" src="{{ $production->imageUrl() }}" alt="{{ $production->image }}">
    <h1>{{ $production->title }}</h1>
    <p>{{ $production->content }}</p>
@endsection
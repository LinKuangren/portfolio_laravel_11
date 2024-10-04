@extends('layout.base')

@section('title', $experience->title)
@section('description', 'Page d\'information sur une expériences pro.')

@section('content')
    <img class="h-32" src="{{ $experience->imageUrl() }}" alt="{{ $experience->image }}">
    <h1>{{ $experience->title }}</h1>
    <p>{{ $experience->company }}</p>
    <p>{{ $experience->time }}</p>
    <p>{{ $experience->content }}</p>
@endsection
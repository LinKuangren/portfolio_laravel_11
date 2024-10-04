@extends('layout.admin.base_admin')

@section('title', 'Modification d\une expérience pro' )
@section('description', 'Page pour modifier une expérience pro.')

@section('content')
    <h1>Modifier l' expérience pro: {{ $experience->name }}</h1>
    @include('experiences.form')
@endsection
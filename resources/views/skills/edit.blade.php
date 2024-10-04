@extends('layout.admin.base_admin')

@section('title', 'Modification d\une compétence' )
@section('description', 'Page pour modifier une compétence.')

@section('content')
    <h1>Modifier la compétence: {{ $skill->name }}</h1>
    @include('skills.form')
@endsection
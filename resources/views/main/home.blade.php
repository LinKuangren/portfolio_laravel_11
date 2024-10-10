@extends('layout.base')

@section('title', 'Page d\'accueil')
@section('description', 'Page d\'accueil du site.')

@section('content')
    <h1 class="text-4xl font-bold text-center">Qui je suis ?</h1>
    <p>zejhf ezlkfh ezkjf ekzbfkezh fezhf lezf ekzjf ezfelzhf ezf ez fehf ez fieeklf elfj ekfjei fhelif efez fekf ef eif eek feskj fe fesr</p>
    <div>
        <h3 class="text-2xl font-bold text-center mt-6 mb-3">Diplômes</h3>
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 px-4 py-4">
            @foreach ($certifications as $certification)
                <article class="w-full min-h-28 content-center bg-emerald-200 hover:bg-emerald-300 rounded-md shadow-md">
                    <div class="flex justify-center">
                        <img class="h-40" src="{{ asset('images/diplome.png') }}" alt="{{ asset('images/diplome.png') }}">
                    </div>
                    <h3 class="text-center text-xl pb-4">{{ $certification->name }}</h3>
                </article>
            @endforeach
        </div>
    </div>
    <div>
        <h3 class="text-2xl font-bold text-center mt-6 mb-3">Dernières Expériences</h3>
        <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 px-4 py-4">
            @foreach ($experiences as $experience)
                <a href="{{ route('experiences.show', ['experience' => $experience->id, 'slug' => $experience->slug]) }}">
                    <article class="w-full min-h-28 content-center bg-emerald-200 hover:bg-emerald-300 rounded-md shadow-md">
                        <img src="{{ $experience->imageUrl() }}" alt="{{ $experience->image}}">
                        <h3 class="text-center text-xl py-2">{{ $experience->title }}</h3>
                    </article>
                </a>
            @endforeach
        </div>
    </div>
    <div>
        <h3 class="text-2xl font-bold text-center mt-6 mb-3">Dernières Réalisations</h3>
        <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 px-4 py-4">
            @foreach ($productions as $production)
                <a href="{{ route('productions.show', ['production' => $production->id, 'slug' => $production->slug]) }}">
                    <article class="w-full min-h-28 content-center bg-emerald-200 hover:bg-emerald-300 rounded-md shadow-md">
                        <img src="{{ $production->imageUrl() }}" alt="{{ $production->image}}">
                        <h3 class="text-center text-xl py-2">{{ $production->title }}</h3>
                    </article>
                </a>
            @endforeach
        </div>
    </div>
@endsection
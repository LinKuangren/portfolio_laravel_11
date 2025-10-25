@extends('layout.base')

@section('title', 'Portfolio Danné Romain')
@section('description', 'Page d\'accueil du site.')

@section('content')
    <div>
        <h1 class="text-4xl font-bold text-center mt-6 mb-3">Qui je suis ?</h1>
        <div class="grid text-justify">
            <div class="grid sm:flex">
                <img class="justify-self-center rounded-md mb-4 sm:h-96 sm:mb-O sm:mr-6" src="{{ asset('images/photo_perso.jpg') }}" alt="{{ asset('images/photo_perso.jpg') }}">
                <div class="grid">
                    <p>Bonjour je m'appelle <strong>Danné Romain</strong>, j'ai 24 ans et je viens de <strong>finir mon année scolaire</strong> en <strong>2eme année de Master Développement Web</strong> à <strong>Digital Campus</strong> à Bordeaux.</p>
                    <br>
                    <p>Je suis à la recherche d'un <b>emploi </b>dans le domaine du <strong>développement web</strong> et plus précisément sur du <strong>Back-end</strong> avec <strong>Symfony</strong> ou <strong>Laravel</strong>.</p>
                    <br>
                    <p>J'ai obtenu un Bac Professionnel en <strong>Communication Visuelle et Plurimédia</strong> qui m'a donné de solides connaissances dans le <strong>graphisme</strong> et des logiciels tels que <strong>Illustrator, Photoshop et InDesign</strong>. Cela m'a permis aussi de faire de <strong>nombreux stages</strong> comme vous pouvez le voir sur mon CV et j'ai acquis une certaine <strong>expérience du travail d'équipe en milieu professionnel</strong>.</p>
                </div>
            </div>
            <br>
            <p>Depuis cela fait <strong>5 ans</strong> que je me spécialise dans le digital et au travers des divers <strong>projets réalisés</strong> le développement est devenu une évidence.</p>
            <br>
            <p>Je suis quelqu'un de <strong>sérieux</strong>, de <strong>rigoureux, soucieux de bien faire</strong>. Je ne regarde pas le temps que je passe sur un projet, seul compte le résultat.</p>
        </div>
    </div>
    <div>
        <h3 class="text-2xl font-bold text-center mt-6 mb-3">Diplômes</h3>
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 py-4">
            @foreach ($certifications as $certification)
                <article class="w-full min-h-28 content-center bg-emerald-400 border-2 border-emerald-400 hover:bg-emerald-300 rounded-md shadow-md">
                    <div class="flex justify-center">
                        <img class="h-20 my-8" src="{{ asset('images/diplome.png') }}" alt="{{ asset('images/diplome.png') }}">
                    </div>
                    <h3 class="text-center text-xl pb-2">{{ $certification->name }}</h3>
                </article>
            @endforeach
        </div>
    </div>
    <div>
        <h3 class="text-2xl font-bold text-center mt-6 mb-3">Dernières Expériences</h3>
        <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 py-4">
            @foreach ($experiences as $experience)
                <a href="{{ route('experiences.show', ['experience' => $experience->id, 'slug' => $experience->slug]) }}">
                    <article class="w-full min-h-28 content-center bg-emerald-400 border-2 border-emerald-400 hover:bg-emerald-300 rounded-md shadow-md">
                        <img class="w-full bg-white rounded-t-md" src="{{ $experience->imageUrl() }}" alt="{{ $experience->image}}">
                        <h3 class="text-center text-xl py-2">{{ $experience->title }}</h3>
                    </article>
                </a>
            @endforeach
        </div>
    </div>
    <div>
        <h3 class="text-2xl font-bold text-center mt-6 mb-3">Dernières Réalisations</h3>
        <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 py-4">
            @foreach ($productions as $production)
                <div>
                    <a href="{{ route('productions.show', ['production' => $production->id, 'slug' => $production->slug]) }}">
                        <article class="w-full min-h-28 content-center bg-emerald-400 border-2 border-emerald-400 hover:bg-emerald-300 rounded-t-md shadow-md">
                            <div class="bg-white rounded-t-md">
                                <img class="w-full rounded-t-md object-scale-down" src="{{ $production->imageUrl() }}" alt="{{ $production->image}}">
                            </div>
                            <h3 class="text-center text-xl py-2">{{ $production->title }}</h3>
                        </article>
                    </a>
                    @if ($production->url !== null)
                        <div class="flex justify-center">
                            <a class="px-8 py-4 sm:px-5 sm:py-2 text-center bg-blue-800 text-white rounded-sm hover:bg-blue-500" href="{{ $production->url }}">Voir site</a>
                        </div>
                    @endif
                </div>
            @endforeach
        </div>
    </div>
@endsection
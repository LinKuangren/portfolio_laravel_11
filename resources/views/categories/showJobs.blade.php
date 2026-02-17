@extends('layout.base')

@section('title', $categorie->name . ' - ' . ($currentJob ?? 'Réalisations'))
@section('description', 'Page d\'une catégorie filtrée par métier.')

@section('content')
    <h1 class="text-4xl text-center mt-6 mb-3"><strong>Categorie :</strong> {{ $categorie->name }}</h1>
    <div class="sm:flex grid gap-4 my-4 justify-center">
        {{-- Bouton vers la catégorie Graphiste --}}
        <a href="{{ route('categories.showJobs', ['name' => 'Graphiste', 'categorie' => 7]) }}" 
        class="px-6 py-3 bg-emerald-500 text-white rounded shadow hover:bg-emerald-400 font-bold">
        Voir Graphisme
        </a>

        {{-- Bouton vers la catégorie Développeur --}}
        <a href="{{ route('categories.showJobs', ['name' => 'Developpeur', 'categorie' => 8]) }}" 
        class="px-6 py-3 bg-blue-800 text-white rounded shadow hover:bg-blue-500 font-bold">
        Voir Développement
        </a>
    </div>

    @if ($productions->isEmpty())
        <div class="text-center py-10">
            <h3 class="text-2xl font-bold mt-6 mb-3">Réalisations {{ $currentJob ? "($currentJob)" : "" }} :</h3>
            <p class="text-gray-500 italic">Aucune production trouvée pour cette sélection.</p>
        </div>
    @else
        <div>
            <h3 class="text-2xl font-bold text-start mt-6 mb-3 px-4">
                Réalisations {{ $currentJob === 'graphiste' ? 'en Graphisme' : ($currentJob === 'developpeur' ? 'en Développement' : '') }} :
            </h3>
            
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 px-4 py-4">
                @foreach ($productions as $production)
                    <a href="{{ route('productions.show', ['production' => $production->id, 'slug' => $production->slug]) }}">
                        <article class="w-full min-h-28 content-center bg-emerald-200 border-2 border-emerald-300 hover:bg-emerald-300 rounded-md shadow-md transition-transform hover:scale-105">
                            <div class="bg-white rounded-t-md">
                                <img class="w-full rounded-t-md object-cover h-48" src="{{ $production->imageUrl() }}" alt="{{ $production->image }}">
                            </div>
                            <h3 class="text-center text-xl py-2 font-semibold">{{ $production->title }}</h3>
                        </article>
                    </a>
                @endforeach
            </div>

            <div class="px-4 mt-6">
                {{ $productions->appends(['job' => $currentJob])->links('pagination::tailwind') }}
            </div>
        </div>
    @endif
@endsection
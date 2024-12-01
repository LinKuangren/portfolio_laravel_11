@extends('layout.base')

@section('title', 'Toutes les productions')
@section('description', 'Page de toutes les réalisations.')

@section('content')
    <h1 class="text-4xl font-bold text-center mt-6 mb-3">Productions</h1>
    @auth
        <div class="flex my-4 justify-center">
            <a class="ml-2 px-5 py-3 bg-blue-800 hover:bg-blue-500 text-white rounded-sm" href="{{ route('productions.add') }}">Créer une réalisation</a>
        </div>
    @endauth
    <div class="grid grid-cols-1 md:grid-cols-2 gap-5 py-4">
        @foreach ($productions as $production)
            @auth
                <div class="grid">
                    <article class="w-full p-4 min-h-28 bg-emerald-500 hover:bg-emerald-400 rounded-md [--shadow:rgba(60,64,67,0.3)_0_1px_2px_0,rgba(60,64,67,0.15)_0_2px_6px_2px] [box-shadow:var(--shadow)]">
                        <div class="flex justify-center bg-white rounded-t-md">
                            <a href="{{ route('productions.show', ['slug' => $production->slug, 'production' => $production->id]) }}">
                                <img class="w-96 object-scale-down h-96" src="{{ $production->imageUrl() }}" alt="{{ $production->image }}">
                            </a>
                        </div>
                        <a href="{{ route('productions.show', ['slug' => $production->slug, 'production' => $production->id]) }}"><h3 class="text-3xl font-bold text-center mt-2 mb-4">{{ $production->title }}</h3></a>
                        <div class="gap-1 flex-wrap flex">
                            @foreach ($production->categories as $categorie)
                                <a class="py-1 px-5 text-white rounded-3xl bg-gray-600 hover:bg-gray-500" href="{{ route('categories.showProductions', ['categorie' => $categorie->id, 'name' => $categorie->name]) }}">
                                    <small>{{ $categorie->name }}</small>
                                </a>
                            @endforeach
                        </div>
                        @if ($production->url !== null)
                            <div class="flex m-4 py-2 justify-center">
                                <a class="px-8 py-4 sm:px-5 sm:py-2 text-center bg-blue-800 text-white rounded-sm hover:bg-blue-500" href="{{ $production->url }}">Voir site</a>
                            </div>
                        @endif
                        @auth
                            <div class="flex mt-4 gap-3 justify-center">
                                <a class="mr-1 px-5 py-3 bg-orange-600 hover:bg-orange-500 text-white rounded-sm" href="{{ route('productions.edit', ['production' => $production->id]) }}">Modifier</a>
                                <form type="submit" action="{{ route('productions.delete', $production->id) }}" method="post" onsubmit="return confirm('tu veux vraiment supprimer ?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="ml-1 px-5 py-3 bg-red-600 hover:bg-red-500 text-white rounded-sm" type="submit">Supprimer</button>
                                </form>
                            </div>
                        @endauth
                    </article>
                </div>
            @endauth
            @guest
                <div class="grid">
                    <article class="w-full p-4 min-h-28 bg-emerald-500 hover:bg-emerald-400 rounded-md [--shadow:rgba(60,64,67,0.3)_0_1px_2px_0,rgba(60,64,67,0.15)_0_2px_6px_2px] [box-shadow:var(--shadow)]">
                        <a href="{{ route('productions.show', ['slug' => $production->slug, 'production' => $production->id]) }}">
                            <div class="flex justify-center bg-white rounded-t-md">
                                <img class="w-96 object-scale-down h-96" src="{{ $production->imageUrl() }}" alt="{{ $production->image }}">
                            </div>
                            <h3 class="text-3xl font-bold text-center mt-2 mb-4">{{ $production->title }}</h3>
                            <div class="gap-1 flex justify-center flex-wrap">
                                @foreach ($production->categories as $categorie)
                                    <a class="py-1 px-5 text-white rounded-3xl bg-gray-600 hover:bg-gray-500" href="{{ route('categories.showProductions', ['categorie' => $categorie->id, 'name' => $categorie->name]) }}">
                                        <small>{{ $categorie->name }}</small>
                                    </a>
                                @endforeach
                            </div>
                        </a>
                        @if ($production->url !== null)
                            <div class="flex mt-4 py-2 justify-center">
                                <a class="px-8 py-4 sm:px-5 sm:py-2 text-center bg-blue-800 text-white rounded-sm hover:bg-blue-500" href="{{ $production->url }}">Voir site</a>
                            </div>
                        @endif
                        </article>
                </div>
            @endguest
        @endforeach
        {{ $productions->links('pagination::tailwind') }}
    </div>
@endsection
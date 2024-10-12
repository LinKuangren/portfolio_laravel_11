@extends('layout.base')

@section('title', 'Toutes les catégories')
@section('description', 'Page de toutes les catégories.')

@section('content')
    <h1 class="text-4xl font-bold text-center mt-6 mb-3">Catégories</h1>
    @auth
        <div class="flex my-4 justify-center">
            <a class="ml-2 px-5 py-3 bg-blue-800 hover:bg-blue-600 text-white rounded-sm" href="{{ route('categories.add') }}">Créer une catégorie</a>
        </div>
    @endauth
    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-4 py-4">
        @foreach ($categories as $categorie)
            @auth  
                <article class="w-full min-h-28 content-center bg-emerald-200 hover:bg-emerald-300 rounded-md [--shadow:rgba(60,64,67,0.3)_0_1px_2px_0,rgba(60,64,67,0.15)_0_2px_6px_2px] [box-shadow:var(--shadow)]">
                    <a href="{{ route('categories.showProductions', ['name' => $categorie->name, 'categorie' => $categorie->id])}}">
                        <h3 class="text-3xl text-center">{{ $categorie->name }}</h3>
                        @auth
                            <div class="flex mt-2 gap-3 xl:justify-start justify-center">
                                <a class="px-5 py-3 bg-orange-600 hover:bg-orange-700 text-white rounded-sm" href="{{ route('categories.edit', ['categorie' => $categorie->id]) }}">Modifier</a>
                                <form type="submit" action="{{ route('categories.delete', $categorie->id) }}" method="post" onsubmit="return confirm('tu veux vraiment supprimer ?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="px-5 py-3 bg-red-600 hover:bg-red-700 text-white rounded-sm" type="submit">Supprimer</button>
                                </form>
                            </div>
                        @endauth
                    </a>
                </article>  
            @endauth
            @guest
                <a href="{{ route('categories.showProductions', ['name' => $categorie->name, 'categorie' => $categorie->id])}}">
                    <article class="w-full min-h-28 content-center bg-emerald-200 hover:bg-emerald-300 rounded-md [--shadow:rgba(60,64,67,0.3)_0_1px_2px_0,rgba(60,64,67,0.15)_0_2px_6px_2px] [box-shadow:var(--shadow)]">
                        <h3 class="text-3xl text-center">{{ $categorie->name }}</h3>
                    </article>
                </a>
            @endguest
        @endforeach
    </div>
    {{ $categories->links('pagination::tailwind') }}
@endsection
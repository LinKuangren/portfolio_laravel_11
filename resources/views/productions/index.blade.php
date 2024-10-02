@extends('layout.base')

@section('title', 'Toutes les productions')

@section('content')
    <h1 class="text-3xl font-bold">Productions :</h1>
    <div class="flex my-4">
        <a class="ml-2 px-5 py-3 bg-blue-800 hover:bg-blue-500 text-white rounded-sm" href="{{ route('productions.add') }}">Créer une réalisation</a>
    </div>
    <div>
        @foreach ($productions as $production)
            <article class="[--shadow:rgba(60,64,67,0.3)_0_1px_2px_0,rgba(60,64,67,0.15)_0_2px_6px_2px] p-4 w-auto h-auto rounded-sm-2xl bg-white [box-shadow:var(--shadow)]">
                <div class="flex justify-center">
                    <a href="{{ route('productions.show', ['slug' => $production->slug, 'production' => $production->id]) }}">
                        <img class="h-44 hover:border-solid hover:border-2 hover:border-blue-500" src="{{ $production->imageUrl() }}" alt="{{ $production->image }}">
                    </a>
                </div>
                <a href="{{ route('productions.show', ['slug' => $production->slug, 'production' => $production->id]) }}"><h3 class="text-3xl hover:underline">{{ $production->title }}</h3></a>
                <p>{{ Str::limit($production->content, 8) }}</p>
                <div class="flex mt-4">
                    <a class="mr-1 px-5 py-3 bg-orange-600 hover:bg-orange-500 text-white rounded-sm" href="{{ route('productions.edit', ['production' => $production->id]) }}">Modifier</a>
                    <form type="submit" action="{{ route('productions.delete', $production->id) }}" method="post" onsubmit="return confirm('tu veux vraiment supprimer ?')">
                        @csrf
                        @method('DELETE')
                        <button class="ml-1 px-5 py-3 bg-red-600 hover:bg-red-500 text-white rounded-sm" type="submit">Supprimer</button>
                    </form>
                </div>
            </article>
        @endforeach
        {{ $productions->links('pagination::tailwind') }}
    </div>
@endsection
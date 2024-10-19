@extends('layout.base')

@section('title', 'Toutes les compétences')
@section('description', 'Page de toutes les compétences.')

@section('content')
    <h1 class="text-4xl font-bold text-center mt-6 mb-3">Compétences</h1>
    @auth
        <div class="flex my-4 justify-center">
            <a class="ml-2 px-5 py-3 bg-blue-800 text-white rounded-sm" href="{{ route('skills.add') }}">Créer une compétence</a>
        </div>
    @endauth
    <div class="sm:grid grid-cols-1 md:grid-cols-2 gap-4 py-4">
        @foreach ($skills as $skill)
            <article class="flex w-full p-4 min-h-28 content-center bg-emerald-200 hover:bg-emerald-300 rounded-md [--shadow:rgba(60,64,67,0.3)_0_1px_2px_0,rgba(60,64,67,0.15)_0_2px_6px_2px] [box-shadow:var(--shadow)]">
                <div class="flex justify-center bg-white">
                    <img class="min-w-28 h-28" src="{{ $skill->imageUrl() }}" alt="{{ $skill->image }}">
                </div>
                <div class="grid">
                    <div class="ml-4">
                        <h3 class="text-2xl font-bold text-start mt-2 mb-4">{{ $skill->name }}</h3>
                        <p><strong>Durée :</strong> {{ $skill->level }} ans</p>
                    </div>
                    @auth
                        <div class="flex mt-4 lg:gap-3 justify-center">
                            <a class="mr-1 px-5 py-3 bg-orange-600 hover:bg-orange-500 text-white rounded-sm" href="{{ route('skills.edit', ['skill' => $skill->id]) }}">Modifier</a>
                            <form type="submit" action="{{ route('skills.delete', $skill->id) }}" method="post" onsubmit="return confirm('tu veux vraiment supprimer ?')">
                                @csrf
                                @method('DELETE')
                                <button class="ml-1 px-5 py-3 bg-red-600 hover:bg-red-500 text-white rounded-sm" type="submit">Supprimer</button>
                            </form>
                        </div>
                    @endauth
                </div>
            </article>
        @endforeach
        {{ $skills->links('pagination::tailwind') }}
    </div>
@endsection
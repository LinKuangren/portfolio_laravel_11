@extends('layout.base')

@section('title', 'Toutes les experiences pro')
@section('description', 'Page de toutes les exprériences pro.')

@section('content')
    <h1 class="text-4xl font-bold text-center mt-6 mb-3">Expériences</h1>
    @auth
        <div class="flex my-4 justify-center">
            <a class="ml-2 px-5 py-3 bg-blue-800 hover:bg-blue-500 text-white rounded-sm" href="{{ route('experiences.add') }}">Créer une experience pro</a>
        </div>
    @endauth
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 py-4">
        @foreach ($experiences as $experience)
            @auth
                <article class="w-full p-4 min-h-28 content-center bg-emerald-500 hover:bg-emerald-400 rounded-md [--shadow:rgba(60,64,67,0.3)_0_1px_2px_0,rgba(60,64,67,0.15)_0_2px_6px_2px] [box-shadow:var(--shadow)]">
                    <div class="flex bg-white justify-center">
                        <a href="{{ route('experiences.show', ['slug' => $experience->slug, 'experience' => $experience->id]) }}">
                            <img class="w-96 object-scale-down h-96" src="{{ $experience->imageUrl() }}" alt="{{ $experience->image }}">
                        </a>
                    </div>
                    <a href="{{ route('experiences.show', ['slug' => $experience->slug, 'experience' => $experience->id]) }}"><h3 class="text-3xl font-bold text-center mt-2 mb-4">{{ $experience->title }}</h3></a>
                    <p><strong>Entreprise :</strong> {{ $experience->company }}</p>
                    <small><strong>Durée :</strong> {{ $experience->time }}</small>
                    @auth
                        <div class="flex mt-4 gap-3 justify-center">
                            <a class="mr-1 px-5 py-3 bg-orange-600 hover:bg-orange-500 text-white rounded-sm" href="{{ route('experiences.edit', ['experience' => $experience->id]) }}">Modifier</a>
                            <form type="submit" action="{{ route('experiences.delete', $experience->id) }}" method="post" onsubmit="return confirm('tu veux vraiment supprimer ?')">
                                @csrf
                                @method('DELETE')
                                <button class="ml-1 px-5 py-3 bg-red-600 hover:bg-red-500 text-white rounded-sm" type="submit">Supprimer</button>
                            </form>
                        </div>
                    @endauth
                </article>
            @endauth
            @guest
                <a href="{{ route('experiences.show', ['slug' => $experience->slug, 'experience' => $experience->id]) }}">
                    <article class="w-full p-4 min-h-28 content-center bg-emerald-500 hover:bg-emerald-400 rounded-md [--shadow:rgba(60,64,67,0.3)_0_1px_2px_0,rgba(60,64,67,0.15)_0_2px_6px_2px] [box-shadow:var(--shadow)]">
                    <div class="flex bg-white justify-center">
                        <img class="w-96 object-scale-down h-96" src="{{ $experience->imageUrl() }}" alt="{{ $experience->image }}">
                    </div>
                    <h3 class="text-3xl font-bold text-center mt-2 mb-4">{{ $experience->title }}</h3>
                    <p><strong>Entreprise :</strong> {{ $experience->company }}</p>
                    <small><strong>Durée :</strong> {{ $experience->time }}</small>
                    </article>
                </a>
            @endguest
        @endforeach
        {{ $experiences->links('pagination::tailwind') }}
    </div>
@endsection
@extends('layout.base')

@section('title', 'Toutes les certifications')
@section('description', 'Page de toutes les certifications.')

@section('content')
<h1 class="text-4xl font-bold text-center mt-6 mb-3">Diplômes</h1>
    @auth
        <div class="flex my-4 justify-center">
            <a class="ml-2 px-5 py-3 bg-blue-800 hover:bg-blue-600 text-white rounded-sm" href="{{ route('certifications.add') }}">Créer un diplôme</a>
        </div>
    @endauth
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 py-4">
        @foreach ($certifications as $certification)
            @auth  
                <article class="w-full p-4 min-h-32 content-center bg-emerald-500 hover:bg-emerald-400 rounded-md [--shadow:rgba(60,64,67,0.3)_0_1px_2px_0,rgba(60,64,67,0.15)_0_2px_6px_2px] [box-shadow:var(--shadow)]">
                    <div class="flex justify-center">
                        <img class="h-20 my-8"" src="{{ asset('images/diplome.png') }}" alt="{{ asset('images/diplome.png') }}">
                    </div>
                    <h3 class="text-3xl font-bold text-center">{{ $certification->name }}</h3>
                    <p class="text-center"><strong>Année : </strong> {{ $certification->year }}</p>
                    @auth
                        <div class="flex mt-2 gap-3 justify-center">
                            <a class="px-5 py-3 bg-orange-600 hover:bg-orange-700 text-white rounded-sm" href="{{ route('certifications.edit', ['certification' => $certification->id]) }}">Modifier</a>
                            <form type="submit" action="{{ route('certifications.delete', $certification->id) }}" method="post" onsubmit="return confirm('tu veux vraiment supprimer ?')">
                                @csrf
                                @method('DELETE')
                                <button class="px-5 py-3 bg-red-600 hover:bg-red-700 text-white rounded-sm" type="submit">Supprimer</button>
                            </form>
                        </div>
                    @endauth
                </article>  
            @endauth
            @guest
                <article class="w-full p-4 min-h-28 content-center bg-emerald-500 hover:bg-emerald-400 rounded-md [--shadow:rgba(60,64,67,0.3)_0_1px_2px_0,rgba(60,64,67,0.15)_0_2px_6px_2px] [box-shadow:var(--shadow)]">
                    <div class="flex justify-center">
                        <img class="h-20 my-8"" src="{{ asset('images/diplome.png') }}" alt="{{ asset('images/diplome.png') }}">
                    </div>
                    <h3 class="text-3xl font-bold text-center">{{ $certification->name }}</h3>
                    <p class="text-lg text-center"><strong>Année : </strong> {{ $certification->year }}</p>
                </article>
            @endguest
        @endforeach
        {{ $certifications->links('pagination::tailwind') }}
    </div>
@endsection
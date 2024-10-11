@extends('layout.base')

@section('title', 'Toutes les experiences pro')
@section('description', 'Page de toutes les exprériences pro.')

@section('content')
<h1 class="text-4xl font-bold text-center mt-6 mb-3">Expériences</h1>
    @auth
        <div class="flex my-4">
            <a class="ml-2 px-5 py-3 bg-blue-800 hover:bg-blue-500 text-white rounded-sm" href="{{ route('experiences.add') }}">Créer une experience pro</a>
        </div>
    @endauth
    <div>
        @foreach ($experiences as $experience)
            <article class="[--shadow:rgba(60,64,67,0.3)_0_1px_2px_0,rgba(60,64,67,0.15)_0_2px_6px_2px] p-4 w-auto h-auto rounded-sm-2xl bg-white [box-shadow:var(--shadow)]">
                <div class="flex justify-center">
                    <a href="{{ route('experiences.show', ['slug' => $experience->slug, 'experience' => $experience->id]) }}">
                        <img class="h-44 hover:border-solid hover:border-2 hover:border-blue-500" src="{{ $experience->imageUrl() }}" alt="{{ $experience->image }}">
                    </a>
                </div>
                <a href="{{ route('experiences.show', ['slug' => $experience->slug, 'experience' => $experience->id]) }}"><h3 class="text-3xl hover:underline">{{ $experience->title }}</h3></a>
                <p>{{ Str::limit($experience->content, 8) }}</p>
                @auth
                    <div class="flex mt-4">
                        <a class="mr-1 px-5 py-3 bg-orange-600 hover:bg-orange-500 text-white rounded-sm" href="{{ route('experiences.edit', ['experience' => $experience->id]) }}">Modifier</a>
                        <form type="submit" action="{{ route('experiences.delete', $experience->id) }}" method="post" onsubmit="return confirm('tu veux vraiment supprimer ?')">
                            @csrf
                            @method('DELETE')
                            <button class="ml-1 px-5 py-3 bg-red-600 hover:bg-red-500 text-white rounded-sm" type="submit">Supprimer</button>
                        </form>
                    </div>
                @endauth
            </article>
        @endforeach
        {{ $experiences->links('pagination::tailwind') }}
    </div>
@endsection
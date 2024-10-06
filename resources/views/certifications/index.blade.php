@extends('layout.base')

@section('title', 'Toutes les certifications')
@section('description', 'Page de toutes les certifications.')

@section('content')
    <h1 class="text-3xl font-bold">Certifications :</h1>
    @auth
        <div class="flex my-4">
            <a href="{{ route('certifications.add') }}">Créer une certifications</a>
        </div>
    @endauth
    <div>
        @foreach ($certifications as $certification)
            <article>
                <h3>{{ $certification->name }}</h3>
                <p>{{ $certification->year }}</p>
                @auth
                    <div class="flex mt-4">
                        <a href="{{ route('certifications.edit', ['certification' => $certification->id]) }}">Modifier</a>
                        <form type="submit" action="{{ route('certifications.delete', $certification->id) }}" method="post" onsubmit="return confirm('tu veux vraiment supprimer ?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Supprimer</button>
                        </form>
                    </div>
                @endauth
            </article>
        @endforeach
        {{ $certifications->links('pagination::tailwind') }}
    </div>
@endsection
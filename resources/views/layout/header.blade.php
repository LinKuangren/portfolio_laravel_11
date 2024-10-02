<header class="hidden overflow-hidden lg:flex flex-col  h-full bg-gradient-to-tr from-gray-700 via-gray-800 to-gray-900 text-white shadow-2xl min-h-screen">
    <div class="w-32 m-4 mb-8">
        <img src="{{ asset('images/logo.png') }}" alt="Logo-danne-romain" class="ease-in-out transform hover:-translate-y-0.5">
    </div>
    <hr class="ml-2 mr-2 mb-3 mt-2"/>
    <nav class="text-lg m-4">
        <ul>
            <li class="mb-4"><a href="{{ route('home') }}" class="">Accueil</a></li>
            <li class="mb-4"><a href="{{ route('categories.index') }}">Categories</a></li>
            <li class="mb-4"><a href="{{ route('certifications.index') }}">Certifications</a></li>
            <li class="mb-4"><a href="{{ route('categories.index') }}">Expériences</a></li>
            <li class="mb-4"><a href="{{ route('productions.index') }}">Réalisations</a></li>
            <li class="mb-4"><a href="{{ route('skills.index') }}">Compétences</a></li>
        </ul>
    </nav>
</header>
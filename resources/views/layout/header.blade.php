<header class="hidden overflow-hidden lg:flex flex-col  h-full bg-gradient-to-tr from-gray-700 via-gray-800 to-gray-900 text-white shadow-2xl min-h-screen">
    <div class="w-32 m-4 mb-8">
        <img src="{{ asset('images/logo.png') }}" alt="Logo-danne-romain" class="ease-in-out transform hover:-translate-y-0.5">
    </div>
    <hr class="ml-2 mr-2 mb-3 mt-2"/>
    <nav class="text-lg m-4">
        <ul>
            <li class="mb-4"><i class="fa-solid fa-house mr-2"></i><a href="{{ route('home') }}" class="">Accueil</a></li>
            <li class="mb-4"><i class="fa-solid fa-tag mr-2"></i><a href="{{ route('categories.index') }}">Categories</a></li>
            <li class="mb-4"><i class="fa-solid fa-certificate mr-2"></i><a href="{{ route('certifications.index') }}">Certifications</a></li>
            <li class="mb-4"><i class="fa-solid fa-handshake mr-2"></i><a href="{{ route('experiences.index') }}">Expériences</a></li>
            <li class="mb-4"><i class="fa-solid fa-folder-open mr-2"></i><a href="{{ route('productions.index') }}">Réalisations</a></li>
            <li class="mb-4"><i class="fa-solid fa-database mr-2"></i><a href="{{ route('skills.index') }}">Compétences</a></li>
            <li class="mb-4"><i class="fas fa-address-book pr-1"></i><a href="{{ route('contact') }}">Contact</a></li>
        </ul>
    </nav>
    <div class="m-auto mb-2 mb-lg-0">
        @auth
            <a href="{{ route('user.profil') }}">{{ Auth::user()->name }}</a>
            <form action="{{ route('auth.logout') }}" method="post">
                @method("delete")
                @csrf
                <button class="nav-link">Se déconnecter</button>
            </form>
        @endauth
        @guest
            <div class="nav-item">
                <a class="nav-link" href="{{ route('auth.login') }}">Se connecter</a>  
            </div>
            <div class="nav-item">
                <a class="nav-link" href="{{ route('auth.register') }}">S'inscrire</a>
            </div>
        @endguest
    </div>
    <a href="{{ route('download_cv') }}" class="btn btn-primary">Télécharger mon CV</a>
</header>
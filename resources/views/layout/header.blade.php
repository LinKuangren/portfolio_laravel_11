<button data-collapse-toggle="navbar-default" id="burger" type="button" class="fixed ml-2 mt-2 inline-flex items-center p-2 w-16 h-16 justify-center text-sm text-emerald-500 rounded-lg lg:hidden hover:bg-emerald-100 focus:outline-none focus:ring-2 focus:ring-emerald-200 dark:text-emerald-400 dark:hover:bg-emerald-700 dark:focus:ring-emerald-600" aria-controls="navbar-default" aria-expanded="false">
    <span class="sr-only">Open main menu</span>
    <svg class="w-8 h-8" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15"/>
    </svg>
</button>
<header id="menu" class="fixed hidden overflow-hidden lg:flex flex-col h-full bg-gradient-to-tr from-gray-700 via-gray-800 to-gray-900 text-white shadow-2xl px-5 py-4">
    <div class="w-32 m-4 mb-8 self-center">
        <a href="{{ route('home') }}">
            <img src="{{ asset('images/logo.png') }}" alt="Logo-danne-romain" class="ease-in-out transform hover:-translate-y-0.5">
        </a>
    </div>
    <hr class="ml-2 mr-2 mb-3 mt-2"/>
    <nav class="text-lg m-4">
        <ul>
            <li class="mb-4 hover:rounded-sm hover:shadow-md"><i class="fa-solid fa-house mr-2"></i><a class="hover:text-emerald-500" href="{{ route('home') }}" class="">Accueil</a></li>
            @auth
            <li class="mb-4 hover:rounded-sm hover:shadow-md"><i class="fa-solid fa-tag mr-2"></i><a class="hover:text-emerald-500" href="{{ route('categories.index') }}">Categories</a></li>
            @endauth
            <li class="mb-4 hover:rounded-sm hover:shadow-md"><i class="fa-solid fa-certificate mr-2"></i><a class="hover:text-emerald-500" href="{{ route('certifications.index') }}">Diplômes</a></li>
            <li class="mb-4 hover:rounded-sm hover:shadow-md"><i class="fa-solid fa-handshake mr-2"></i><a class="hover:text-emerald-500" href="{{ route('experiences.index') }}">Expériences</a></li>
            <li class="mb-4 hover:rounded-sm hover:shadow-md"><i class="fa-solid fa-folder-open mr-2"></i><a class="hover:text-emerald-500" href="{{ route('productions.index') }}">Réalisations</a></li>
            <li class="mb-4 hover:rounded-sm hover:shadow-md"><i class="fa-solid fa-database mr-2"></i><a class="hover:text-emerald-500" href="{{ route('skills.index') }}">Compétences</a></li>
            <li class="mb-4 hover:rounded-sm hover:shadow-md"><i class="fas fa-address-book pr-1"></i><a class="hover:text-emerald-500" href="{{ route('contact') }}">Contact</a></li>
        </ul>
    </nav>
    @auth
        <div class="m-auto mb-2 mb-lg-0">
            <div class="flex">
                <a class="hover:text-emerald-500" href="{{ route('user.profil') }}">{{ Auth::user()->name }}</a>
                <form action="{{ route('auth.logout') }}" method="post">
                    @method("delete")
                    @csrf
                    <button class="nav-link hover:text-emerald-500">Se déconnecter</button>
                </form>
            </div>
        </div>
    @endauth
    @guest
        <div class="m-auto">
            {{-- <div class="flex gap-10">
                <div class="nav-item">
                    <a class="nav-link hover:text-emerald-500" href="{{ route('auth.login') }}">Se connecter</a>  
                </div>
                <div class="nav-item">
                    <a class="nav-link hover:text-emerald-500" href="{{ route('auth.register') }}">S'inscrire</a>
                </div>
            </div> --}}
        </div>
    @endguest
    <div class="flex justify-center mb-3">
        <a href="https://github.com/LinKuangren"><i class="fa-brands fa-github fa-lg mr-3 hover:text-emerald-500"></i></a>
        <a href="https://www.linkedin.com/in/romain-danne-969440194/"><i class="fa-brands fa-linkedin fa-lg hover:text-emerald-500"></i></a>
    </div>
    <a href="{{ route('download_cv') }}" class="px-3 py-2 bg-blue-800 hover:bg-blue-600 text-white rounded-sm"><i class="fa-solid fa-download mr-2"></i>Télécharger mon CV</a>
</header>
<div class="ml-56 hidden lg:flex"></div>
<button data-collapse-toggle="navbar-default" id="burger" type="button" class="fixed ml-2 mt-2 inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-emerald-500 rounded-lg lg:hidden hover:bg-emerald-100 focus:outline-none focus:ring-2 focus:ring-emerald-200 dark:text-emerald-400 dark:hover:bg-emerald-700 dark:focus:ring-emerald-600" aria-controls="navbar-default" aria-expanded="false">
    <span class="sr-only">Open main menu</span>
    <svg class="w-8 h-8" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15"/>
    </svg>
</button>
<header id="menu" class="fixed hidden overflow-hidden lg:flex flex-col h-full bg-blue-900 text-white shadow-2xl px-5 py-4">
    <div class="w-32 m-4 mb-8 self-center">
        <a href="{{ route('home') }}">
            <img src="{{ asset('images/logo.png') }}" alt="Danne_Romain" class="ease-in-out transform hover:-translate-y-0.5">
        </a>
    </div>
    <p class="text-center font-bold">ADMINISTRATEUR</p>
    <hr class="ml-2 mr-2 mb-3 mt-2"/>
    <nav class="text-lg m-4">
        <ul>
            <li class="mb-4 hover:rounded-sm hover:shadow-md"><i class="fa-solid fa-house mr-2"></i><a class="hover:text-emerald-300" href="{{ route('home') }}" class="">Accueil</a></li>
            <li class="mb-4 hover:rounded-sm hover:shadow-md"><i class="fa-solid fa-tag mr-2"></i><a class="hover:text-emerald-300" href="{{ route('categories.index') }}">Categories</a></li>
            <li class="mb-4 hover:rounded-sm hover:shadow-md"><i class="fa-solid fa-certificate mr-2"></i><a class="hover:text-emerald-300" href="{{ route('certifications.index') }}">Diplômes</a></li>
            <li class="mb-4 hover:rounded-sm hover:shadow-md"><i class="fa-solid fa-handshake mr-2"></i><a class="hover:text-emerald-300" href="{{ route('experiences.index') }}">Expériences</a></li>
            <li class="mb-4 hover:rounded-sm hover:shadow-md"><i class="fa-solid fa-folder-open mr-2"></i><a class="hover:text-emerald-300" href="{{ route('productions.index') }}">Réalisations</a></li>
            <li class="mb-4 hover:rounded-sm hover:shadow-md"><i class="fa-solid fa-database mr-2"></i><a class="hover:text-emerald-300" href="{{ route('skills.index') }}">Compétences</a></li>
            <li class="mb-4 hover:rounded-sm hover:shadow-md"><i class="fas fa-address-book pr-1"></i><a class="hover:text-emerald-300" href="{{ route('contact') }}">Contact</a></li>
        </ul>
    </nav>
    <div class="m-auto mb-2 mb-lg-0 flex">
        @auth
            {{ Auth::user()->name }}
            <form action="{{ route('auth.logout') }}" method="post">
                @method("delete")
                @csrf
                <button class="nav-link hover:text-emerald-300" class="nav-link">Se déconnecter</button>
            </form>
        @endauth
    </div>
    <div class="flex justify-center">
        <a href="https://github.com/LinKuangren"><i class="fa-brands fa-github mr-2 hover:text-emerald-500"></i></a>
        <a href="https://www.linkedin.com/in/romain-danne-969440194/"><i class="fa-brands fa-linkedin hover:text-emerald-500"></i></a>
    </div>
</header>
<div class="ml-56 hidden lg:flex"></div>
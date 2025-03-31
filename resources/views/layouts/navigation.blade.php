<nav class="py-4 px-6 flex justify-between items-center">
    <div class="flex items-center space-x-8">
        <a href="/" class="flex items-center">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6 text-lime-500">
                <path fill-rule="evenodd" d="M9.315 7.584C12.195 3.883 16.695 1.5 21.75 1.5a.75.75 0 0 1 .75.75c0 5.056-2.383 9.555-6.084 12.436A6.75 6.75 0 0 1 9.75 22.5a.75.75 0 0 1-.75-.75v-4.131A15.838 15.838 0 0 1 6.382 15H2.25a.75.75 0 0 1-.75-.75 6.75 6.75 0 0 1 7.815-6.666ZM15 6.75a2.25 2.25 0 1 0 0 4.5 2.25 2.25 0 0 0 0-4.5Z" clip-rule="evenodd" />
                <path d="M5.26 17.242a.75.75 0 1 0-.897-1.203 5.243 5.243 0 0 0-2.05 5.022.75.75 0 0 0 .625.627 5.243 5.243 0 0 0 5.022-2.051.75.75 0 1 0-1.202-.897 3.744 3.744 0 0 1-3.008 1.51c0-1.23.592-2.323 1.51-3.008Z" />
            </svg>
            <span class="ml-2 font-semibold text-lg">Fund</span>
        </a>
        <div class="hidden md:flex space-x-8">
            <a href="{{ route('welcome') }}" class="text-gray-800 hover:text-gray-600">Accueil</a>
            <a href="{{ route('projects.index') }}" class="text-gray-800 hover:text-gray-600">Projets</a>
            <a href="{{ route('how-it-works') }}" class="text-gray-800 hover:text-gray-600">Fonctionnement</a>
            <a href="{{ route('about') }}" class="text-gray-800 hover:text-gray-600">À propos</a>
            <a href="{{ route('faq') }}" class="text-gray-800 hover:text-gray-600">FAQ</a>      
        </div>
    </div>
    @auth
        <a href="{{ route('dashboard') }}" class="bg-lime-300 hover:bg-lime-400 text-gray-800 px-4 py-2 rounded-full text-sm font-medium">
            Tableau de bord
        </a>
    @else
        <a href="#" class="bg-lime-300 hover:bg-lime-400 text-gray-800 px-4 py-2 rounded-full text-sm font-medium">
            Télécharger l'app
        </a>
    @endauth
</nav>
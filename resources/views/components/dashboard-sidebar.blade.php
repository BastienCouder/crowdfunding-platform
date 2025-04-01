<div class="h-screen flex overflow-hidden bg-white">
    <!-- Sidebar pour mobile -->
    <div id="sidebar-overlay" class="fixed inset-0 bg-gray-600 bg-opacity-75 z-20 hidden lg:hidden"></div>
    
    <!-- Sidebar -->
    <aside id="sidebar" class="fixed inset-y-0 left-0 w-64 bg-white border-r border-gray-100 shadow-sm transform -translate-x-full lg:translate-x-0 transition-transform duration-300 ease-in-out z-30 lg:static lg:h-auto lg:overflow-y-visible lg:pt-0 lg:w-64 lg:block">
        <div class="h-full flex flex-col">
            <!-- Logo -->
            <div class="flex items-center h-16 px-6 border-b border-gray-100">
                <a href="/" class="flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6 text-lime-500">
                        <path fill-rule="evenodd" d="M9.315 7.584C12.195 3.883 16.695 1.5 21.75 1.5a.75.75 0 0 1 .75.75c0 5.056-2.383 9.555-6.084 12.436A6.75 6.75 0 0 1 9.75 22.5a.75.75 0 0 1-.75-.75v-4.131A15.838 15.838 0 0 1 6.382 15H2.25a.75.75 0 0 1-.75-.75 6.75 6.75 0 0 1 7.815-6.666ZM15 6.75a2.25 2.25 0 1 0 0 4.5 2.25 2.25 0 0 0 0-4.5Z" clip-rule="evenodd" />
                        <path d="M5.26 17.242a.75.75 0 1 0-.897-1.203 5.243 5.243 0 0 0-2.05 5.022.75.75 0 0 0 .625.627 5.243 5.243 0 0 0 5.022-2.051.75.75 0 1 0-1.202-.897 3.744 3.744 0 0 1-3.008 1.51c0-1.23.592-2.323 1.51-3.008Z" />
                    </svg>
                    <span class="ml-2 font-semibold text-lg">Fund</span>
                </a>
                <button id="close-sidebar" class="ml-auto lg:hidden">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-gray-500">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
            
            <!-- Navigation -->
            <nav class="flex-1 px-2 py-4 space-y-1 overflow-y-auto">
                <!-- Tableau de bord -->
                <a href="{{ route('dashboard') }}" class="{{ request()->routeIs('dashboard') ? 'bg-lime-50 text-lime-700' : 'text-gray-700 hover:bg-gray-50' }} group flex items-center px-4 py-2 text-sm font-medium rounded-lg">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="{{ request()->routeIs('dashboard') ? 'text-lime-500' : 'text-gray-500 group-hover:text-gray-600' }} mr-3 flex-shrink-0 h-5 w-5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6A2.25 2.25 0 016 3.75h2.25A2.25 2.25 0 0110.5 6v2.25a2.25 2.25 0 01-2.25 2.25H6a2.25 2.25 0 01-2.25-2.25V6zM3.75 15.75A2.25 2.25 0 016 13.5h2.25a2.25 2.25 0 012.25 2.25V18a2.25 2.25 0 01-2.25 2.25H6A2.25 2.25 0 013.75 18v-2.25zM13.5 6a2.25 2.25 0 012.25-2.25H18A2.25 2.25 0 0120.25 6v2.25A2.25 2.25 0 0118 10.5h-2.25a2.25 2.25 0 01-2.25-2.25V6zM13.5 15.75a2.25 2.25 0 012.25-2.25H18a2.25 2.25 0 012.25 2.25V18A2.25 2.25 0 0118 20.25h-2.25A2.25 2.25 0 0113.5 18v-2.25z" />
                    </svg>
                    Tableau de bord
                </a>
                
                <!-- Les projets -->
                <!-- <a href="{{ route('projects.index') }}" class="{{ request()->routeIs('projects.index') ? 'bg-lime-50 text-lime-700' : 'text-gray-700 hover:bg-gray-50' }} group flex items-center px-4 py-2 text-sm font-medium rounded-lg">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="{{ request()->routeIs('projects.index') ? 'text-lime-500' : 'text-gray-500 group-hover:text-gray-600' }} mr-3 flex-shrink-0 h-5 w-5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75A.75.75 0 013 6a.75.75 0 01.75-.75h16.5a.75.75 0 010 1.5h-16.5a.75.75 0 01-.75-.75zM3.75 12a.75.75 0 01.75-.75h16.5a.75.75 0 010 1.5h-16.5a.75.75 0 01-.75-.75z" />
                    </svg>
                    Collectes
                </a> -->

                <!-- Mes projets -->
                <a href="{{ route('projects.my-projects') }}" class="{{ request()->routeIs('projects.my-projects') ? 'bg-lime-50 text-lime-700' : 'text-gray-700 hover:bg-gray-50' }} group flex items-center px-4 py-2 text-sm font-medium rounded-lg">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="{{ request()->routeIs('projects.my-projects') ? 'text-lime-500' : 'text-gray-500 group-hover:text-gray-600' }} mr-3 flex-shrink-0 h-5 w-5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 12.75V12A2.25 2.25 0 014.5 9.75h15A2.25 2.25 0 0121.75 12v.75m-8.69-6.44l-2.12-2.12a1.5 1.5 0 00-1.061-.44H4.5A2.25 2.25 0 002.25 6v12a2.25 2.25 0 002.25 2.25h15A2.25 2.25 0 0021.75 18V9a2.25 2.25 0 00-2.25-2.25h-5.379a1.5 1.5 0 01-1.06-.44z" />
                    </svg>
                    Mes projets
                </a>
                
                <!-- Créer un projet -->
                <a href="{{ route('projects.create') }}" class="{{ request()->routeIs('projects.create') ? 'bg-lime-50 text-lime-700' : 'text-gray-700 hover:bg-gray-50' }} group flex items-center px-4 py-2 text-sm font-medium rounded-lg">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="{{ request()->routeIs('projects.create') ? 'text-lime-500' : 'text-gray-500 group-hover:text-gray-600' }} mr-3 flex-shrink-0 h-5 w-5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                    </svg>
                    Créer un projet
                </a>
                
             <!--    Contributions     -->
                <a href="{{ route('contributions.index') }}" class="{{ request()->routeIs('contributions.index') ? 'bg-lime-50 text-lime-700' : 'text-gray-700 hover:bg-gray-50' }} group flex items-center px-4 py-2 text-sm font-medium rounded-lg">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="{{ request()->routeIs('contributions.index') ? 'text-lime-500' : 'text-gray-500 group-hover:text-gray-600' }} mr-3 flex-shrink-0 h-5 w-5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 18.75a60.07 60.07 0 0115.797 2.101c.727.198 1.453-.342 1.453-1.096V18.75M3.75 4.5v.75A.75.75 0 013 6h-.75m0 0v-.375c0-.621.504-1.125 1.125-1.125H20.25M2.25 6v9m18-10.5v.75c0 .414.336.75.75.75h.75m-1.5-1.5h.375c.621 0 1.125.504 1.125 1.125v9.75c0 .621-.504 1.125-1.125 1.125h-.375m1.5-1.5H21a.75.75 0 00-.75.75v.75m0 0H3.75m0 0h-.375a1.125 1.125 0 01-1.125-1.125V15m1.5 1.5v-.75A.75.75 0 003 15h-.75M15 10.5a3 3 0 11-6 0 3 3 0 016 0zm3 0h.008v.008H18V10.5zm-12 0h.008v.008H6V10.5z" />
                    </svg>
                    Contributions
                </a>
                
                <!-- Commentaires   -->
                <a href="{{ route('comments.index') }}" class="{{ request()->routeIs('comments.index') ? 'bg-lime-50 text-lime-700' : 'text-gray-700 hover:bg-gray-50' }} group flex items-center px-4 py-2 text-sm font-medium rounded-lg">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="{{ request()->routeIs('comments.index') ? 'text-lime-500' : 'text-gray-500 group-hover:text-gray-600' }} mr-3 flex-shrink-0 h-5 w-5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M7.5 8.25h9m-9 3H12m-9.75 1.51c0 1.6 1.123 2.994 2.707 3.227 1.129.166 2.27.293 3.423.379.35.026.67.21.865.501L12 21l2.755-4.133a1.14 1.14 0 01.865-.501 48.172 48.172 0 003.423-.379c1.584-.233 2.707-1.626 2.707-3.228V6.741c0-1.602-1.123-2.995-2.707-3.228A48.394 48.394 0 0012 3c-2.392 0-4.744.175-7.043.513C3.373 3.746 2.25 5.14 2.25 6.741v6.018z" />
                    </svg>
                    Commentaires
                </a>
              
                <div class="pt-4 mt-4 border-t border-gray-100">
                    <h3 class="px-4 text-xs font-semibold text-gray-500 uppercase tracking-wider">Paramètres</h3>
                </div>
                
                <!-- Profil -->
                <a href="{{ route('profile.edit') }}" class="{{ request()->routeIs('profile.edit') ? 'bg-lime-50 text-lime-700' : 'text-gray-700 hover:bg-gray-50' }} group flex items-center px-4 py-2 text-sm font-medium rounded-lg">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="{{ request()->routeIs('profile.edit') ? 'text-lime-500' : 'text-gray-500 group-hover:text-gray-600' }} mr-3 flex-shrink-0 h-5 w-5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
                    </svg>
                    Profil
                </a>
            </nav>
            
            <!-- Profil utilisateur -->
            <div class="p-4 border-t border-gray-100">
                <div class="flex items-center">
                    <img src="{{ auth()->user()->avatar ?? 'https://ui-avatars.com/api/?name='.urlencode(auth()->user()->name).'&color=7F9CF5&background=EBF4FF' }}" alt="{{ auth()->user()->name }}" class="h-8 w-8 rounded-full mr-3">
                    <div>
                        <p class="text-sm font-medium text-gray-900">{{ auth()->user()->name }}</p>
                        <p class="text-xs text-gray-500 truncate">{{ auth()->user()->email }}</p>
                    </div>
                    <form method="POST" action="{{ route('logout') }}" class="ml-auto">
                        @csrf
                        <button type="submit" class="text-gray-500 hover:text-gray-700">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15M12 9l-3 3m0 0l3 3m-3-3h12.75" />
                            </svg>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </aside>
    
    <!-- Contenu principal -->
    <div class="flex flex-col w-0 flex-1 overflow-hidden">
        <div class="relative z-10 flex-shrink-0 flex h-16 bg-white border-b border-gray-100">
            <button id="open-sidebar" class="px-4 border-r border-gray-100 text-gray-500 focus:outline-none focus:bg-gray-100 focus:text-gray-600 lg:hidden">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-6 w-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                </svg>
            </button>
            
            <!-- En-tête de la barre supérieure -->
            <div class="flex-1 px-4 flex justify-end md:justify-between items-center">
            <div class="hidden md:flex space-x-8">
            <a href="{{ route('welcome') }}" class="text-gray-800 hover:text-gray-600">Accueil</a>
            <a href="{{ route('projects.index') }}" class="text-gray-800 hover:text-gray-600">Projets</a>
            <a href="{{ route('how-it-works') }}" class="text-gray-800 hover:text-gray-600">Fonctionnement</a>
            <a href="{{ route('about') }}" class="text-gray-800 hover:text-gray-600">À propos</a>
            <a href="{{ route('faq') }}" class="text-gray-800 hover:text-gray-600">FAQ</a>      
        </div>
                <div class="ml-4 flex items-center md:ml-6">
                    
                    <!-- Menu déroulant du profil -->
                    <div class="ml-3 relative">
                        <div>
                            <button id="user-menu-button" class="max-w-xs bg-white flex items-center text-sm rounded-full focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-lime-500">
                                <span class="sr-only">Ouvrir le menu utilisateur</span>
                                <img class="h-8 w-8 rounded-full" src="{{ auth()->user()->avatar ?? 'https://ui-avatars.com/api/?name='.urlencode(auth()->user()->name).'&color=7F9CF5&background=EBF4FF' }}" alt="{{ auth()->user()->name }}">
                            </button>
                        </div>
                        
                        <!-- Menu déroulant -->
                        <div id="user-menu" class="hidden origin-top-right absolute right-0 mt-2 w-48 rounded-md shadow-lg py-1 bg-white ring-1 ring-black ring-opacity-5 focus:outline-none" role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button" tabindex="-1">
                            <a href="{{ route('profile.edit') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">Votre profil</a>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="block w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">Se déconnecter</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Contenu de la page -->
        <main class="flex-1 relative overflow-y-auto focus:outline-none">
            {{ $slot }}
        </main>
    </div>
</div>

<script>
    // Gestion du menu mobile
    document.addEventListener('DOMContentLoaded', function() {
        const openSidebarButton = document.getElementById('open-sidebar');
        const closeSidebarButton = document.getElementById('close-sidebar');
        const sidebar = document.getElementById('sidebar');
        const sidebarOverlay = document.getElementById('sidebar-overlay');
        const userMenuButton = document.getElementById('user-menu-button');
        const userMenu = document.getElementById('user-menu');
        
        // Ouvrir la sidebar
        openSidebarButton.addEventListener('click', function() {
            sidebar.classList.remove('-translate-x-full');
            sidebarOverlay.classList.remove('hidden');
        });
        
        // Fermer la sidebar
        closeSidebarButton.addEventListener('click', function() {
            sidebar.classList.add('-translate-x-full');
            sidebarOverlay.classList.add('hidden');
        });
        
        // Fermer la sidebar en cliquant sur l'overlay
        sidebarOverlay.addEventListener('click', function() {
            sidebar.classList.add('-translate-x-full');
            sidebarOverlay.classList.add('hidden');
        });
        
        // Toggle du menu utilisateur
        userMenuButton.addEventListener('click', function() {
            userMenu.classList.toggle('hidden');
        });
        
        // Fermer le menu utilisateur en cliquant ailleurs
        document.addEventListener('click', function(event) {
            if (!userMenuButton.contains(event.target) && !userMenu.contains(event.target)) {
                userMenu.classList.add('hidden');
            }
        });
    });
</script>


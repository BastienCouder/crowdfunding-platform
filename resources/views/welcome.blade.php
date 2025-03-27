<x-app-layout>
    @include('layouts.navigation')
    <!-- Section Hero -->
    <section class="relative mb-12">
        <div class="relative rounded-lg mx-6 overflow-hidden">
            <img src="{{ asset('images/hands.jpg') }}" alt="Mains qui se tendent les unes vers les autres" class="w-full h-[220px] md:h-[300px] object-cover">
            <div class="absolute inset-0 bg-gray-800/30"></div>
            <div class="absolute inset-0 flex flex-col justify-center px-8 md:px-12">
                <h1 class="text-white text-6xl md:text-7xl font-bold mb-1">Fund</h1>
                <p class="text-white text-xl md:text-2xl font-medium mb-6">Aidez<br>les autres</p>
                <div class="flex">
                    <a href="#" class="bg-lime-300 hover:bg-lime-400 text-gray-800 px-4 py-2 rounded-full text-sm font-medium inline-block">
                        Lancer une collecte
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Section Rapide comme l'éclair -->
    <section class="px-6 mb-12">
        <h2 class="text-2xl font-bold mb-1">Collectez, Rapide comme l'éclair</h2>
        <p class="text-gray-600 mb-12">Collectez des fonds à la vitesse de la pensée ! Élevez votre cause en une minute avec notre plateforme de collecte ultra-rapide.</p>
        
        <!-- Grille de fonctionnalités -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-16">
            <!-- Fonctionnalité 1 -->
            <div class="bg-gray-50 p-6 rounded-lg">
                <div class="bg-lime-100 w-10 h-10 rounded-lg flex items-center justify-center mb-4">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-lime-500">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 18v-5.25m0 0a6.01 6.01 0 0 0 1.5-.189m-1.5.189a6.01 6.01 0 0 1-1.5-.189m3.75 7.478a12.06 12.06 0 0 1-4.5 0m3.75 2.383a14.406 14.406 0 0 1-3 0M14.25 18v-.192c0-.983.658-1.823 1.508-2.316a7.5 7.5 0 1 0-7.517 0c.85.493 1.509 1.333 1.509 2.316V18" />
                    </svg>
                </div>
                <h3 class="font-bold text-lg mb-2">Allumez l'impact</h3>
                <p class="text-gray-600 text-sm">Allumez une étincelle en partageant votre cause avec la communauté. Chaque don, aussi petit soit-il, fera une différence significative.</p>
            </div>
            
            <!-- Fonctionnalité 2 -->
            <div class="bg-gray-50 p-6 rounded-lg">
                <div class="bg-lime-100 w-10 h-10 rounded-lg flex items-center justify-center mb-4">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-lime-500">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M7.217 10.907a2.25 2.25 0 1 0 0 2.186m0-2.186c.18.324.283.696.283 1.093s-.103.77-.283 1.093m0-2.186 9.566-5.314m-9.566 7.5 9.566 5.314m0 0a2.25 2.25 0 1 0 3.935 2.186 2.25 2.25 0 0 0-3.935-2.186Z" />
                    </svg>
                </div>
                <h3 class="font-bold text-lg mb-2">Faites passer le mot</h3>
                <p class="text-gray-600 text-sm">Tirez parti de la puissance des médias sociaux et du partage public pour amplifier la portée de votre campagne. Connectez-vous à des causes dignes d'intérêt sans barrières.</p>
            </div>
            
            <!-- Fonctionnalité 3 -->
            <div class="bg-gray-50 p-6 rounded-lg">
                <div class="bg-lime-100 w-10 h-10 rounded-lg flex items-center justify-center mb-4">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-lime-500">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12.75 3.03v.568c0 .334.148.65.405.864l1.068.89c.442.369.535 1.01.216 1.49l-.51.766a2.25 2.25 0 0 1-1.161.886l-.143.048a1.107 1.107 0 0 0-.57 1.664c.369.555.169 1.307-.427 1.605L9 13.125l.423 1.059a.956.956 0 0 1-1.652.928l-.679-.906a1.125 1.125 0 0 0-1.906.172L4.5 15.75l-.612.153M12.75 3.031a9 9 0 0 0-8.862 12.872M12.75 3.031a9 9 0 0 1 6.69 14.036m0 0-.177-.529A2.25 2.25 0 0 0 17.128 15H16.5l-.324-.324a1.453 1.453 0 0 0-2.328.377l-.036.073a1.586 1.586 0 0 1-.982.816l-.99.282c-.55.157-.894.702-.8 1.267l.073.438c.08.474.49.821.97.821.846 0 1.598.542 1.865 1.345l.215.643m5.276-3.67a9.012 9.012 0 0 1-5.276 3.67m0 0a9 9 0 0 1-10.275-4.835M15.75 9c0 .896-.393 1.7-1.016 2.25" />
                    </svg>
                </div>
                <h3 class="font-bold text-lg mb-2">Connectez-vous globalement</h3>
                <p class="text-gray-600 text-sm">Établissez des relations durables, amplifiez votre cause et faites une différence à l'échelle mondiale. Créez des liens significatifs au sein des communautés locales.</p>
            </div>
        </div>
    </section>

 <!-- Section Collecte urgente -->
<section class="px-6 mb-12">
    <h2 class="text-2xl font-bold mb-1">Collecte urgente !</h2>
    <p class="text-gray-600 mb-8">Le temps presse ! Rejoignez notre mission MAINTENANT pour avoir un impact immédiat. Chaque seconde compte !</p>
    
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-12">
        @foreach($endingSoonProjects as $project)
        <div class="rounded-lg overflow-hidden border border-gray-200 hover:shadow-md transition-shadow">
            <img src="{{ $project->images->first() ? asset('storage/'.$project->images->first()->path) : asset('images/default-project.jpg') }}" 
                 alt="{{ $project->title }}" 
                 class="w-full h-40 object-cover">
            <div class="p-4">
                <div class="flex items-center mb-2">
                    <span class="text-sm text-gray-600">{{ $project->user->name }}</span>
                    <span class="ml-2 w-2 h-2 rounded-full {{ $project->isActive() ? 'bg-green-500' : 'bg-gray-500' }}"></span>
                </div>
                <h3 class="font-bold">{{ $project->title }}</h3>
                <div class="w-full bg-gray-200 rounded-full h-2.5 mt-3">
                    <div class="bg-lime-500 h-2.5 rounded-full" 
                         style="width: {{ $project->progressPercentage() }}%"></div>
                </div>
                <div class="flex justify-between items-center mt-4">
                    <span class="font-bold">{{ number_format($project->current_amount, 0, ',', ' ') }} €</span>
                    <span class="text-xs text-gray-500">
                        @if($project->daysLeft() > 0)
                            {{ $project->daysLeft() }} jour(s) restant
                        @else
                            Dernier jour !
                        @endif
                    </span>
                </div>
                <a href="{{ route('projects.show', $project) }}" class="mt-4 inline-block w-full text-center bg-lime-300 hover:bg-lime-400 text-gray-800 px-4 py-2 rounded-full text-sm font-medium">
                    Contribuer
                </a>
            </div>
        </div>
        @endforeach
    </div>
    
    <div class="text-center">
        <a href="{{ route('projects.index') }}" class="inline-block bg-gray-800 hover:bg-gray-700 text-white px-6 py-2 rounded-full text-sm font-medium">
            Voir toutes les collectes
        </a>
    </div>
</section>

    <!-- Section Rejoignez les collectes -->
    <section class="px-6 mb-12 text-center">
        <div class="relative py-12 px-4 max-w-4xl mx-auto">
            <!-- Images de fond -->
            <div class="absolute left-0 top-1/4">
                <img src="{{ asset('images/feuille.jpg') }}" alt="Collecteurs de fonds" class="w-28 h-28 hidden md:block object-cover rounded-lg">
            </div>
            <div class="absolute right-0 top-1/4">
                <img src="{{ asset('images/bottle.jpg') }}" alt="Collecteurs de fonds" class="w-28 h-28 hidden md:block object-cover rounded-lg">
            </div>
            <div class="absolute left-28 bottom-0">
                <img src="{{ asset('images/ampoule.jpg') }}" alt="Collecteurs de fonds" class="w-28 h-28 hidden md:block object-cover rounded-lg">
            </div>
            <div class="absolute right-28 bottom-0">
                <img src="{{ asset('images/plant.jpg') }}" alt="Collecteurs de fonds" class="w-28 h-28 hidden md:block object-cover rounded-lg">
            </div>
            
            <h2 class="text-xl font-bold mb-2">Faites partie des collectes avec plus de</h2>
            <div class="text-7xl font-bold mb-4">217 924</div>
            <p class="mb-6">Personnes du monde entier</p>
            <a href="#" class="bg-lime-300 hover:bg-lime-400 text-gray-800 px-6 py-2 rounded-full text-sm font-medium inline-block">
                Rejoignez les collectes maintenant !
            </a>
        </div>
    </section>

    <!-- Section FAQ -->
    <section class="w-full px-6 flex flex-col items-center justify-center mb-16">
        <h2 class="text-2xl font-bold mb-8">Foire Aux Questions.</h2>
        
        <div class="space-y-4 w-full max-w-3xl">
            <div class="border-b pb-4">
                <div class="flex justify-between items-center cursor-pointer faq-toggle">
                    <h3 class="font-medium">Comment puis-je faire un don ?</h3>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                    </svg>
                </div>
                <div class="faq-content hidden mt-2 text-gray-600">
                    <p>Vous pouvez faire un don en cliquant sur le bouton "Faire un don" sur la page de la campagne qui vous intéresse. Plusieurs méthodes de paiement sont disponibles.</p>
                </div>
            </div>
            
            <div class="border-b pb-4">
                <div class="flex justify-between items-center cursor-pointer faq-toggle">
                    <h3 class="font-medium">Mon don est-il déductible des impôts ?</h3>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                    </svg>
                </div>
                <div class="faq-content hidden mt-2 text-gray-600">
                    <p>Oui, dans la plupart des cas, les dons effectués via notre plateforme sont déductibles des impôts. Vous recevrez un reçu fiscal par email après votre don.</p>
                </div>
            </div>
            
            <div class="border-b pb-4">
                <div class="flex justify-between items-center cursor-pointer faq-toggle">
                    <h3 class="font-medium">Puis-je faire un don en l'honneur ou à la mémoire de quelqu'un ?</h3>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                    </svg>
                </div>
                <div class="faq-content hidden mt-2 text-gray-600">
                    <p>Absolument. Lors du processus de don, vous aurez la possibilité de dédier votre don à une personne spécifique. Nous pouvons également envoyer une notification à la personne honorée si vous le souhaitez.</p>
                </div>
            </div>
            
            <div class="border-b pb-4">
                <div class="flex justify-between items-center cursor-pointer faq-toggle">
                    <h3 class="font-medium">Comment mon don sera-t-il utilisé ?</h3>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                    </svg>
                </div>
                <div class="faq-content hidden mt-2 text-gray-600">
                    <p>Les fonds collectés sont directement versés à l'organisme porteur de la campagne. Chaque campagne fournit des détails sur l'utilisation prévue des fonds sur sa page de description.</p>
                </div>
            </div>
            
            <div class="border-b pb-4">
                <div class="flex justify-between items-center cursor-pointer faq-toggle">
                    <h3 class="font-medium">Puis-je mettre en place un don récurrent ?</h3>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                    </svg>
                </div>
                <div class="faq-content hidden mt-2 text-gray-600">
                    <p>Oui, lors du processus de don, vous pouvez choisir l'option "Don mensuel" pour effectuer des dons récurrents. Vous pouvez modifier ou annuler cette option à tout moment depuis votre compte.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Script JavaScript pour la FAQ -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const faqToggles = document.querySelectorAll('.faq-toggle');
            
            faqToggles.forEach(toggle => {
                toggle.addEventListener('click', function() {
                    const content = this.nextElementSibling;
                    const icon = this.querySelector('svg');
                    
                    // Basculer l'affichage du contenu
                    content.classList.toggle('hidden');
                    
                    // Basculer l'icône entre + et -
                    if (content.classList.contains('hidden')) {
                        icon.innerHTML = '<path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />';
                    } else {
                        icon.innerHTML = '<path stroke-linecap="round" stroke-linejoin="round" d="M19.5 12h-15" />';
                    }
                });
            });
        });
    </script>
</x-app-layout>
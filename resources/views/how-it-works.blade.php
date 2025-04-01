
<x-app-layout>
    @include('layouts.navigation')
<section class="relative mb-12">
    <div class="relative rounded-lg mx-6 overflow-hidden">
    <picture>
            <source srcset="{{ asset('images/hands.webp') }}" type="image/webp">
            <source srcset="{{ asset('images/hands.jpg') }}" type="image/jpeg">
            <img src="{{ asset('images/hands.jpg') }}"
                 alt="Mains qui se tendent les unes vers les autres" 
                 loading="eager"
                 width="1200"
                 height="300"
                 class="w-full h-[220px] md:h-[300px] object-cover"
                 style="background: #e2e8f0">
        </picture>
        <div class="absolute inset-0 bg-gray-800/30"></div>
        <div class="absolute inset-0 flex flex-col justify-center px-8 md:px-12">
            <h1 class="text-white text-3xl md:text-5xl font-bold mb-4">Comment ça fonctionne</h1>
            <p class="text-white text-lg md:text-2xl font-medium max-w-2xl">Découvrez comment Fund connecte les porteurs de projets avec les contributeurs pour donner vie aux idées innovantes.</p>
        </div>
    </div>
</section>

<!-- Process Overview -->
<section class="px-6 mb-20">
    <div class="container mx-auto max-w-6xl">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold mb-4">Un processus simple et efficace</h2>
            <div class="w-20 h-1 bg-lime-500 mx-auto mb-6"></div>
            <p class="text-gray-600 max-w-3xl mx-auto">Fund simplifie le financement participatif pour permettre à chacun de contribuer au changement ou de réaliser ses projets. Voici comment ça fonctionne :</p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="bg-white p-8 rounded-xl shadow-sm border border-gray-100 text-center relative">
                <div class="absolute -top-4 -left-4 w-10 h-10 rounded-full bg-lime-500 text-white flex items-center justify-center font-bold text-lg">1</div>
                <div class="bg-lime-100 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-6">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8 text-lime-600">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 18v-5.25m0 0a6.01 6.01 0 001.5-.189m-1.5.189a6.01 6.01 0 01-1.5-.189m3.75 7.478a12.06 12.06 0 01-4.5 0m3.75 2.383a14.406 14.406 0 01-3 0M14.25 18v-.192c0-.983.658-1.823 1.508-2.316a7.5 7.5 0 10-7.517 0c.85.493 1.509 1.333 1.509 2.316V18" />
                    </svg>
                </div>
                <h3 class="text-xl font-bold mb-3">Créer un projet</h3>
                <p class="text-gray-600">Présentez votre idée, définissez votre objectif de financement et créez une campagne attrayante.</p>
            </div>
            
            <div class="bg-white p-8 rounded-xl shadow-sm border border-gray-100 text-center relative">
                <div class="absolute -top-4 -left-4 w-10 h-10 rounded-full bg-lime-500 text-white flex items-center justify-center font-bold text-lg">2</div>
                <div class="bg-lime-100 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-6">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8 text-lime-600">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M7.217 10.907a2.25 2.25 0 100 2.186m0-2.186c.18.324.283.696.283 1.093s-.103.77-.283 1.093m0-2.186l9.566-5.314m-9.566 7.5l9.566 5.314m0 0a2.25 2.25 0 103.935 2.186 2.25 2.25 0 00-3.935-2.186zm0-12.814a2.25 2.25 0 103.933-2.185 2.25 2.25 0 00-3.933 2.185z" />
                    </svg>
                </div>
                <h3 class="text-xl font-bold mb-3">Partager</h3>
                <p class="text-gray-600">Diffusez votre projet sur les réseaux sociaux et mobilisez votre communauté pour atteindre votre objectif.</p>
            </div>
            
            <div class="bg-white p-8 rounded-xl shadow-sm border border-gray-100 text-center relative">
                <div class="absolute -top-4 -left-4 w-10 h-10 rounded-full bg-lime-500 text-white flex items-center justify-center font-bold text-lg">3</div>
                <div class="bg-lime-100 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-6">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8 text-lime-600">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 18.75a60.07 60.07 0 0115.797 2.101c.727.198 1.453-.342 1.453-1.096V18.75M3.75 4.5v.75A.75.75 0 013 6h-.75m0 0v-.375c0-.621.504-1.125 1.125-1.125H20.25M2.25 6v9m18-10.5v.75c0 .414.336.75.75.75h.75m-1.5-1.5h.375c.621 0 1.125.504 1.125 1.125v9.75c0 .621-.504 1.125-1.125 1.125h-.375m1.5-1.5H21a.75.75 0 00-.75.75v.75m0 0H3.75m0 0h-.375a1.125 1.125 0 01-1.125-1.125V15m1.5 1.5v-.75A.75.75 0 003 15h-.75M15 10.5a3 3 0 11-6 0 3 3 0 016 0zm3 0h.008v.008H18V10.5zm-12 0h.008v.008H6V10.5z" />
                    </svg>
                </div>
                <h3 class="text-xl font-bold mb-3">Collecter des fonds</h3>
                <p class="text-gray-600">Recevez les contributions, tenez vos contributeurs informés et réalisez votre projet.</p>
            </div>
        </div>
    </div>
</section>

<!-- For Project Creators -->
<section class="bg-gray-50 py-20 px-6 mb-20">
    <div class="container mx-auto max-w-6xl">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold mb-4">Pour les porteurs de projets</h2>
            <div class="w-20 h-1 bg-lime-500 mx-auto mb-6"></div>
            <p class="text-gray-600 max-w-3xl mx-auto">Vous avez une idée innovante ? Voici comment Fund peut vous aider à la concrétiser.</p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-12 items-center">
            <div>
                <div class="mb-8">
                    <div class="flex items-start mb-4">
                        <div class="bg-lime-100 w-10 h-10 rounded-full flex items-center justify-center mr-4 mt-1 flex-shrink-0">
                            <span class="font-bold text-lime-600">1</span>
                        </div>
                        <div>
                            <h3 class="text-xl font-bold mb-2">Créez votre compte</h3>
                            <p class="text-gray-600">Inscrivez-vous gratuitement sur Fund et complétez votre profil pour gagner en crédibilité auprès des contributeurs potentiels.</p>
                        </div>
                    </div>
                </div>
                
                <div class="mb-8">
                    <div class="flex items-start mb-4">
                        <div class="bg-lime-100 w-10 h-10 rounded-full flex items-center justify-center mr-4 mt-1 flex-shrink-0">
                            <span class="font-bold text-lime-600">2</span>
                        </div>
                        <div>
                            <h3 class="text-xl font-bold mb-2">Définissez votre projet</h3>
                            <p class="text-gray-600">Décrivez votre projet, fixez un objectif de financement réaliste et une durée de campagne (généralement entre 30 et 60 jours).</p>
                        </div>
                    </div>
                </div>
                
                <div class="mb-8">
                    <div class="flex items-start mb-4">
                        <div class="bg-lime-100 w-10 h-10 rounded-full flex items-center justify-center mr-4 mt-1 flex-shrink-0">
                            <span class="font-bold text-lime-600">3</span>
                        </div>
                        <div>
                            <h3 class="text-xl font-bold mb-2">Créez du contenu engageant</h3>
                            <p class="text-gray-600">Ajoutez des photos, vidéos et descriptions détaillées pour présenter votre projet de manière convaincante.</p>
                        </div>
                    </div>
                </div>
                
                <div class="mb-8">
                    <div class="flex items-start mb-4">
                        <div class="bg-lime-100 w-10 h-10 rounded-full flex items-center justify-center mr-4 mt-1 flex-shrink-0">
                            <span class="font-bold text-lime-600">4</span>
                        </div>
                        <div>
                            <h3 class="text-xl font-bold mb-2">Lancez et promouvez</h3>
                            <p class="text-gray-600">Après validation par notre équipe, lancez votre campagne et partagez-la largement pour maximiser vos chances de succès.</p>
                        </div>
                    </div>
                </div>
                
                <div>
                    <div class="flex items-start mb-4">
                        <div class="bg-lime-100 w-10 h-10 rounded-full flex items-center justify-center mr-4 mt-1 flex-shrink-0">
                            <span class="font-bold text-lime-600">5</span>
                        </div>
                        <div>
                            <h3 class="text-xl font-bold mb-2">Recevez vos fonds et réalisez</h3>
                            <p class="text-gray-600">Une fois l'objectif atteint, recevez les fonds et concrétisez votre projet tout en tenant vos contributeurs informés.</p>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="relative">
                <img src="{{ asset('images/project-creator.jpg') }}" alt="Porteur de projet" class="rounded-xl shadow-md w-full h-auto">
                <div class="absolute -bottom-6 -right-6 bg-lime-300 text-fg p-6 rounded-lg shadow-lg">
                    <p class="text-2xl font-bold">93%</p>
                    <p class="text-sm">des projets bien préparés atteignent leur objectif</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- For Contributors -->
<section class="px-6 mb-20">
    <div class="container mx-auto max-w-6xl">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold mb-4">Pour les contributeurs</h2>
            <div class="w-20 h-1 bg-lime-500 mx-auto mb-6"></div>
            <p class="text-gray-600 max-w-3xl mx-auto">Vous souhaitez soutenir des projets innovants ? Voici comment contribuer sur Fund.</p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-12 items-center">
            <div class="order-2 md:order-1">
                <img src="{{ asset('images/contributor.jpg') }}" alt="Contributeur" class="rounded-xl shadow-md w-full h-auto">
            </div>
            
            <div class="order-1 md:order-2">
                <div class="mb-8">
                    <div class="flex items-start mb-4">
                        <div class="bg-lime-100 w-10 h-10 rounded-full flex items-center justify-center mr-4 mt-1 flex-shrink-0">
                            <span class="font-bold text-lime-600">1</span>
                        </div>
                        <div>
                            <h3 class="text-xl font-bold mb-2">Explorez les projets</h3>
                            <p class="text-gray-600">Parcourez notre plateforme pour découvrir des projets innovants dans différentes catégories qui correspondent à vos centres d'intérêt.</p>
                        </div>
                    </div>
                </div>
                
                <div class="mb-8">
                    <div class="flex items-start mb-4">
                        <div class="bg-lime-100 w-10 h-10 rounded-full flex items-center justify-center mr-4 mt-1 flex-shrink-0">
                            <span class="font-bold text-lime-600">2</span>
                        </div>
                        <div>
                            <h3 class="text-xl font-bold mb-2">Choisissez un projet</h3>
                            <p class="text-gray-600">Sélectionnez un projet qui vous inspire et examinez sa description, son objectif et l'équipe derrière le projet.</p>
                        </div>
                    </div>
                </div>
                
                <div class="mb-8">
                    <div class="flex items-start mb-4">
                        <div class="bg-lime-100 w-10 h-10 rounded-full flex items-center justify-center mr-4 mt-1 flex-shrink-0">
                            <span class="font-bold text-lime-600">3</span>
                        </div>
                        <div>
                            <h3 class="text-xl font-bold mb-2">Contribuez en toute sécurité</h3>
                            <p class="text-gray-600">Effectuez votre contribution en quelques clics via notre système de paiement sécurisé (carte bancaire, PayPal, etc.).</p>
                        </div>
                    </div>
                </div>
                
                <div>
                    <div class="flex items-start mb-4">
                        <div class="bg-lime-100 w-10 h-10 rounded-full flex items-center justify-center mr-4 mt-1 flex-shrink-0">
                            <span class="font-bold text-lime-600">4</span>
                        </div>
                        <div>
                            <h3 class="text-xl font-bold mb-2">Suivez l'avancement</h3>
                            <p class="text-gray-600">Recevez des mises à jour régulières sur l'avancement du projet et restez connecté avec les porteurs de projet.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Funding Models -->
<section class="bg-gray-50 py-20 px-6 mb-20">
    <div class="container mx-auto max-w-6xl">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold mb-4">Nos modèles de financement</h2>
            <div class="w-20 h-1 bg-lime-500 mx-auto mb-6"></div>
            <p class="text-gray-600 max-w-3xl mx-auto">Fund propose différents modèles de financement adaptés à tous types de projets.</p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="bg-white p-8 rounded-xl shadow-sm border border-gray-100">
                <div class="bg-lime-100 w-16 h-16 rounded-full flex items-center justify-center mb-6">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8 text-lime-600">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
                <h3 class="text-xl font-bold mb-3">Tout ou rien</h3>
                <p class="text-gray-600 mb-4">Le porteur de projet ne reçoit les fonds que si l'objectif est atteint à 100%. Idéal pour les projets qui nécessitent un montant minimum pour être réalisés.</p>
                <ul class="space-y-2 text-gray-600">
                    <li class="flex items-start">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-lime-500 mr-2 flex-shrink-0 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                        <span>Sécurité pour les contributeurs</span>
                    </li>
                    <li class="flex items-start">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-lime-500 mr-2 flex-shrink-0 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                        <span>Motivation à atteindre l'objectif</span>
                    </li>
                    <li class="flex items-start">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-lime-500 mr-2 flex-shrink-0 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                        <span>Frais de 5% si réussite</span>
                    </li>
                </ul>
            </div>
            
            <div class="bg-white p-8 rounded-xl shadow-sm border border-gray-100">
                <div class="bg-lime-100 w-16 h-16 rounded-full flex items-center justify-center mb-6">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8 text-lime-600">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3 13.125C3 12.504 3.504 12 4.125 12h2.25c.621 0 1.125.504 1.125 1.125v6.75C7.5 20.496 6.996 21 6.375 21h-2.25A1.125 1.125 0 013 19.875v-6.75zM9.75 8.625c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125v11.25c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 01-1.125-1.125V8.625zM16.5 4.125c0-.621.504-1.125 1.125-1.125h2.25C20.496 3 21 3.504 21 4.125v15.75c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 01-1.125-1.125V4.125z" />
                    </svg>
                </div>
                <h3 class="text-xl font-bold mb-3">Flexible</h3>
                <p class="text-gray-600 mb-4">Le porteur de projet reçoit tous les fonds collectés, même si l'objectif n'est pas atteint à 100%. Parfait pour les projets qui peuvent être réalisés partiellement.</p>
                <ul class="space-y-2 text-gray-600">
                    <li class="flex items-start">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-lime-500 mr-2 flex-shrink-0 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                        <span>Flexibilité pour les créateurs</span>
                    </li>
                    <li class="flex items-start">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-lime-500 mr-2 flex-shrink-0 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                        <span>Adaptation possible du projet</span>
                    </li>
                    <li class="flex items-start">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-lime-500 mr-2 flex-shrink-0 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                        <span>Frais de 8% sur les fonds collectés</span>
                    </li>
                </ul>
            </div>
            
            <div class="bg-white p-8 rounded-xl shadow-sm border border-gray-100">
                <div class="bg-lime-100 w-16 h-16 rounded-full flex items-center justify-center mb-6">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8 text-lime-600">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v12m-3-2.818l.879.659c1.171.879 3.07.879 4.242 0 1.172-.879 1.172-2.303 0-3.182C13.536 12.219 12.768 12 12 12c-.725 0-1.45-.22-2.003-.659-1.106-.879-1.106-2.303 0-3.182s2.9-.879 4.006 0l.415.33M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
                <h3 class="text-xl font-bold mb-3">Abonnement</h3>
                <p class="text-gray-600 mb-4">Les contributeurs s'engagent à verser un montant régulier (mensuel, trimestriel). Idéal pour les créateurs de contenu et les projets continus.</p>
                <ul class="space-y-2 text-gray-600">
                    <li class="flex items-start">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-lime-500 mr-2 flex-shrink-0 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                        <span>Revenus récurrents</span>
                    </li>
                    <li class="flex items-start">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-lime-500 mr-2 flex-shrink-0 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                        <span>Relation durable avec la communauté</span>
                    </li>
                    <li class="flex items-start">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-lime-500 mr-2 flex-shrink-0 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                        <span>Frais de 3% par transaction</span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>

<!-- Fees and Transparency -->
<section class="px-6 mb-20">
    <div class="container mx-auto max-w-6xl">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold mb-4">Frais et transparence</h2>
            <div class="w-20 h-1 bg-lime-500 mx-auto mb-6"></div>
            <p class="text-gray-600 max-w-3xl mx-auto">Chez Fund, nous croyons en la transparence totale. Voici comment nos frais sont structurés :</p>
        </div>
        
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Modèle</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Frais</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Paiement</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Avantages</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm font-medium text-gray-900">Tout ou rien</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-900">5% du montant collecté</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-900">Uniquement si l'objectif est atteint</div>
                            </td>
                            <td class="px-6 py-4">
                                <div class="text-sm text-gray-900">Sécurité pour les contributeurs, idéal pour les projets nécessitant un budget minimum</div>
                            </td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm font-medium text-gray-900">Flexible</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-900">8% du montant collecté</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-900">Quel que soit le montant atteint</div>
                            </td>
                            <td class="px-6 py-4">
                                <div class="text-sm text-gray-900">Flexibilité pour les créateurs, adapté aux projets modulables</div>
                            </td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm font-medium text-gray-900">Abonnement</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-900">3% par transaction</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-900">Versement mensuel</div>
                            </td>
                            <td class="px-6 py-4">
                                <div class="text-sm text-gray-900">Revenus récurrents, idéal pour les créateurs de contenu</div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="bg-gray-50 px-6 py-4">
                <p class="text-sm text-gray-600">* Des frais de traitement de paiement de 1,5% + 0,25€ par transaction s'appliquent en plus des frais de plateforme.</p>
            </div>
        </div>
    </div>
</section>

<!-- Security and Trust -->
<section class="bg-gray-50 py-20 px-6 mb-20">
    <div class="container mx-auto max-w-6xl">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold mb-4">Sécurité et confiance</h2>
            <div class="w-20 h-1 bg-lime-500 mx-auto mb-6"></div>
            <p class="text-gray-600 max-w-3xl mx-auto">La sécurité de vos données et de vos transactions est notre priorité absolue.</p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="bg-white p-8 rounded-xl shadow-sm border border-gray-100">
                <div class="bg-lime-100 w-16 h-16 rounded-full flex items-center justify-center mb-6">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8 text-lime-600">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12c0 1.268-.63 2.39-1.593 3.068a3.745 3.745 0 01-1.043 3.296 3.745 3.745 0 01-3.296 1.043A3.745 3.745 0 0112 21c-1.268 0-2.39-.63-3.068-1.593a3.746 3.746 0 01-3.296-1.043 3.745 3.745 0 01-1.043-3.296A3.745 3.745 0 013 12c0-1.268.63-2.39 1.593-3.068a3.745 3.745 0 011.043-3.296 3.746 3.746 0 013.296-1.043A3.746 3.746 0 0112 3c1.268 0 2.39.63 3.068 1.593a3.746 3.746 0 013.296 1.043 3.746 3.746 0 011.043 3.296A3.745 3.745 0 0121 12z" />
                    </svg>
                </div>
                <h3 class="text-xl font-bold mb-3">Vérification des projets</h3>
                <p class="text-gray-600">Tous les projets sont vérifiés par notre équipe avant leur mise en ligne pour garantir leur légitimité et leur conformité à nos conditions d'utilisation.</p>
            </div>
            
            <div class="bg-white p-8 rounded-xl shadow-sm border border-gray-100">
                <div class="bg-lime-100 w-16 h-16 rounded-full flex items-center justify-center mb-6">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8 text-lime-600">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 10.5V6.75a4.5 4.5 0 10-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 002.25-2.25v-6.75a2.25 2.25 0 00-2.25-2.25H6.75a2.25 2.25 0 00-2.25 2.25v6.75a2.25 2.25 0 002.25 2.25z" />
                    </svg>
                </div>
                <h3 class="text-xl font-bold mb-3">Paiements sécurisés</h3>
                <p class="text-gray-600">Toutes les transactions sont protégées par un cryptage SSL de pointe. Nous ne stockons jamais vos informations de paiement sur nos serveurs.</p>
            </div>
            
            <div class="bg-white p-8 rounded-xl shadow-sm border border-gray-100">
                <div class="bg-lime-100 w-16 h-16 rounded-full flex items-center justify-center mb-6">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8 text-lime-600">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M18 18.72a9.094 9.094 0 003.741-.479 3 3 0 00-4.682-2.72m.94 3.198l.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0112 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 016 18.719m12 0a5.971 5.971 0 00-.941-3.197m0 0A5.995 5.995 0 0012 12.75a5.995 5.995 0 00-5.058 2.772m0 0a3 3 0 00-4.681 2.72 8.986 8.986 0 003.74.477m.94-3.197a5.971 5.971 0 00-.94 3.197M15 6.75a3 3 0 11-6 0 3 3 0 016 0zm6 3a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0zm-13.5 0a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0z" />
                    </svg>
                </div>
                <h3 class="text-xl font-bold mb-3">Support communautaire</h3>
                <p class="text-gray-600">Notre équipe de support est disponible 7j/7 pour répondre à vos questions et résoudre tout problème que vous pourriez rencontrer.</p>
            </div>
        </div>
    </div>
</section>

<!-- FAQ Section -->
<section class="px-6 mb-20">
    <div class="container mx-auto max-w-6xl">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold mb-4">Questions fréquentes</h2>
            <div class="w-20 h-1 bg-lime-500 mx-auto mb-6"></div>
            <p class="text-gray-600 max-w-3xl mx-auto">Vous avez des questions sur le fonctionnement de Fund ? Consultez nos réponses aux questions les plus fréquentes.</p>
        </div>
        
        <div class="max-w-3xl mx-auto">
            <div class="space-y-4">
                <div class="border-b pb-4 faq-item">
                    <div class="flex justify-between items-center cursor-pointer faq-header">
                        <h3 class="font-medium">Que se passe-t-il si un projet n'atteint pas son objectif ?</h3>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                        </svg>
                    </div>
                    <div class="faq-content overflow-hidden max-h-0 transition-all duration-300">
                        <p class="pt-4 text-gray-600">Cela dépend du modèle de financement choisi. Dans le modèle "Tout ou rien", les contributeurs sont remboursés intégralement si l'objectif n'est pas atteint. Dans le modèle "Flexible", le porteur de projet reçoit tous les fonds collectés, même si l'objectif n'est pas atteint à 100%.</p>
                    </div>
                </div>
                
                <div class="border-b pb-4 faq-item">
                    <div class="flex justify-between items-center cursor-pointer faq-header">
                        <h3 class="font-medium">Comment Fund vérifie-t-il les projets ?</h3>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                        </svg>
                    </div>
                    <div class="faq-content overflow-hidden max-h-0 transition-all duration-300">
                        <p class="pt-4 text-gray-600">Notre équipe examine chaque projet avant sa mise en ligne pour s'assurer qu'il respecte nos conditions d'utilisation. Nous vérifions l'identité des porteurs de projet, la faisabilité du projet et la transparence des informations fournies.</p>
                    </div>
                </div>
                
                <div class="border-b pb-4 faq-item">
                    <div class="flex justify-between items-center cursor-pointer faq-header">
                        <h3 class="font-medium">Puis-je modifier mon projet après son lancement ?</h3>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                        </svg>
                    </div>
                    <div class="faq-content overflow-hidden max-h-0 transition-all duration-300">
                        <p class="pt-4 text-gray-600">Vous pouvez modifier la description, ajouter des mises à jour et des médias à votre projet après son lancement. Cependant, certains éléments comme l'objectif de financement et la durée de la campagne ne peuvent pas être modifiés une fois que le projet est en ligne.</p>
                    </div>
                </div>
                
                <div class="border-b pb-4 faq-item">
                    <div class="flex justify-between items-center cursor-pointer faq-header">
                        <h3 class="font-medium">Comment sont versés les fonds aux porteurs de projet ?</h3>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                        </svg>
                    </div>
                    <div class="faq-content overflow-hidden max-h-0 transition-all duration-300">
                        <p class="pt-4 text-gray-600">Les fonds sont versés par virement bancaire dans les 15 jours suivant la fin de la campagne (pour les modèles "Tout ou rien" et "Flexible") ou mensuellement (pour le modèle "Abonnement"). Les porteurs de projet doivent avoir fourni leurs coordonnées bancaires et vérifié leur identité.</p>
                    </div>
                </div>
                
                <div class="border-b pb-4 faq-item">
                    <div class="flex justify-between items-center cursor-pointer faq-header">
                        <h3 class="font-medium">Que se passe-t-il si un porteur de projet ne réalise pas son projet ?</h3>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                        </svg>
                    </div>
                    <div class="faq-content overflow-hidden max-h-0 transition-all duration-300">
                        <p class="pt-4 text-gray-600">Les porteurs de projet s'engagent à réaliser leur projet et à tenir leurs contributeurs informés. En cas de problème, ils doivent proposer des solutions alternatives ou des remboursements. Fund peut intervenir en cas de fraude avérée, mais nous encourageons avant tout le dialogue entre porteurs de projet et contributeurs.</p>
                    </div>
                </div>
            </div>
            
            <div class="text-center mt-10">
                <a href="{{ route('faq') }}" class="text-lime-600 hover:text-lime-700 font-medium">
                    Voir toutes les questions →
                </a>
            </div>
        </div>
    </div>
</section>

@include('partials.call-to-action')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // FAQ accordion functionality
        const faqHeaders = document.querySelectorAll('.faq-header');
        
        faqHeaders.forEach(header => {
            header.addEventListener('click', function() {
                const faqItem = this.closest('.faq-item');
                const content = faqItem.querySelector('.faq-content');
                const icon = this.querySelector('svg');
                
                // Toggle the active state
                if (content.style.maxHeight) {
                    content.style.maxHeight = null;
                    icon.innerHTML = '<path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />';
                } else {
                    content.style.maxHeight = content.scrollHeight + "px";
                    icon.innerHTML = '<path stroke-linecap="round" stroke-linejoin="round" d="M19.5 12h-15" />';
                }
            });
        });
    });
</script>

@include('layouts.footer')
</x-app-layout>

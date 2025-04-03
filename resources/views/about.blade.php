<x-app-layout>

@include('layouts.navigation')
    <section class="relative mb-12">
        <div class="relative rounded-lg mx-6 overflow-hidden">
        <picture>
            <source srcset="{{ asset('images/hands.webp') }}" type="image/webp">
            <source srcset="{{ asset('images/hands.jpg') }}" type="image/jpeg">
            <img src="{{ asset('images/hands.webp') }}" 
                 alt="Mains plantant un arbre dans une communauté locale" 
                 loading="eager"
                 width="1200"
                 height="300"
                 class="w-full h-[220px] md:h-[300px] object-cover"
                 style="background: #e2e8f0">
        </picture>
        <div class="absolute inset-0 bg-gray-800/30"></div>
            <div class="absolute inset-0 flex flex-col justify-center px-8 md:px-12">
                <h1 class="text-white text-3xl md:text-5xl font-bold mb-4">Financez l'avenir local</h1>
                <p class="text-white text-lg md:text-2xl font-medium max-w-2xl">La première plateforme régionale dédiée aux projets écocitoyens.</p>
            </div>
        </div>
    </section>

    <!-- Notre mission -->
    <section class="px-6 mb-20">
        <div class="container mx-auto max-w-6xl">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold mb-4">Notre engagement</h2>
                <div class="w-20 h-1 bg-lime-500 mx-auto mb-6"></div>
                <p class="text-gray-600 max-w-3xl mx-auto">ÉcoFund connecte les porteurs de projets durables avec les citoyens engagés de votre territoire. Nous garantissons que 100% des fonds collectés servent des initiatives locales à impact environnemental vérifié.</p>
            </div>
            
            <!-- Valeurs -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mt-12">
                <div class="bg-white p-8 rounded-xl shadow-sm border border-gray-100 text-center">
                    <div class="bg-lime-100 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-6">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8 text-lime-600">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold mb-3">100% Local</h3>
                    <p class="text-gray-600">Tous les projets sont géolocalisés et bénéficient exclusivement à votre région.</p>
                </div>
                
                <div class="bg-white p-8 rounded-xl shadow-sm border border-gray-100 text-center">
                    <div class="bg-lime-100 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-6">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8 text-lime-600">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v12m-3-2.818l.879.659c1.171.879 3.07.879 4.242 0 1.172-.879 1.172-2.303 0-3.182C13.536 12.219 12.768 12 12 12c-.725 0-1.45-.22-2.003-.659-1.106-.879-1.106-2.303 0-3.182s2.9-.879 4.006 0l.415.33M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold mb-3">Économie circulaire</h3>
                    <p class="text-gray-600">Priorité aux projets créant des boucles vertueuses dans l'économie régionale.</p>
                </div>
                
                <div class="bg-white p-8 rounded-xl shadow-sm border border-gray-100 text-center">
                    <div class="bg-lime-100 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-6">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8 text-lime-600">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M21 11.25v8.25a1.5 1.5 0 01-1.5 1.5H5.25a1.5 1.5 0 01-1.5-1.5v-8.25M12 4.875A2.625 2.625 0 109.375 7.5H12m0-2.625V7.5m0-2.625A2.625 2.625 0 1114.625 7.5H12m0 0V21m-8.625-9.75h18c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125h-18c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold mb-3">Impact mesuré</h3>
                    <p class="text-gray-600">Chaque euro investi génère en moyenne 3€ de retombées locales durables.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Notre histoire -->
    <section class="bg-gray-50 py-20 px-6 mb-20">
        <div class="container mx-auto max-w-6xl">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-12 items-center">
                <div>
                    <h2 class="text-3xl font-bold mb-6">Nos racines locales</h2>
                    <div class="w-20 h-1 bg-lime-500 mb-6"></div>
                    <p class="text-gray-600 mb-4">Née en 2020 dans le cadre d'un projet citoyen, ÉcoFund a germé à partir d'un constat simple : 80% des financements écoresponsables quittaient notre région alors que les besoins locaux étaient immenses.</p>
                    <p class="text-gray-600 mb-4">Aujourd'hui, notre plateforme a permis de financer 287 initiatives locales, créant 1200 emplois non-délocalisables et évitant l'émission de 4500 tonnes de CO2 grâce à des solutions développées dans votre territoire.</p>
                    <p class="text-gray-600">Notre particularité ? Un comité d'éthique régional valide chaque projet, et nos outils de suivi permettent de visualiser l'impact concret de votre contribution dans votre quartier.</p>
                </div>
                <div class="relative">
                    <img src="{{ asset('images/ampoule.webp') }}" alt="Carte des projets financés dans la région" class="rounded-xl shadow-md w-full h-auto">
                    <div class="absolute -bottom-6 -left-6 bg-lime-300 text-fg p-4 rounded-lg shadow-lg">
                        <p class="text-2xl font-bold">287</p>
                        <p class="text-sm">Projets locaux financés</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Catégories de projets -->
    <section class="px-6 mb-20">
        <div class="container mx-auto max-w-6xl">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold mb-4">Nos thématiques phares</h2>
                <div class="w-20 h-1 bg-lime-500 mx-auto mb-6"></div>
                <p class="text-gray-600 max-w-3xl mx-auto">Découvrez les domaines où votre contribution fait déjà la différence dans notre région.</p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100">
                    <div class="bg-lime-100 w-12 h-12 rounded-full flex items-center justify-center mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-lime-600">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M21 12a2.25 2.25 0 00-2.25-2.25H15a3 3 0 11-6 0H5.25A2.25 2.25 0 003 12m18 0v6a2.25 2.25 0 01-2.25 2.25H5.25A2.25 2.25 0 013 18v-6m18 0V9M3 12V9m18 0a2.25 2.25 0 00-2.25-2.25H5.25A2.25 2.25 0 003 9m18 0V6a2.25 2.25 0 00-2.25-2.25H5.25A2.25 2.25 0 003 6v3" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold mb-2">Alimentation durable</h3>
                    <p class="text-gray-600 mb-4">Amap, fermes urbaines, circuits courts... 63 projets financés.</p>
                    <div class="flex items-center">
                        <div class="w-full bg-gray-200 rounded-full h-2">
                            <div class="bg-lime-500 h-2 rounded-full" style="width: 42%"></div>
                        </div>
                        <span class="ml-2 text-sm font-medium text-gray-500">42%</span>
                    </div>
                </div>
                
                <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100">
                    <div class="bg-lime-100 w-12 h-12 rounded-full flex items-center justify-center mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-lime-600">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9.813 15.904L9 18.75l-.813-2.846a4.5 4.5 0 00-3.09-3.09L2.25 12l2.846-.813a4.5 4.5 0 003.09-3.09L9 5.25l.813 2.846a4.5 4.5 0 003.09 3.09L15.75 12l-2.846.813a4.5 4.5 0 00-3.09 3.09zM18.259 8.715L18 9.75l-.259-1.035a3.375 3.375 0 00-2.455-2.456L14.25 6l1.036-.259a3.375 3.375 0 002.455-2.456L18 2.25l.259 1.035a3.375 3.375 0 002.456 2.456L21.75 6l-1.035.259a3.375 3.375 0 00-2.456 2.456zM16.894 20.567L16.5 21.75l-.394-1.183a2.25 2.25 0 00-1.423-1.423L13.5 18.75l1.183-.394a2.25 2.25 0 001.423-1.423l.394-1.183.394 1.183a2.25 2.25 0 001.423 1.423l1.183.394-1.183.394a2.25 2.25 0 00-1.423 1.423z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold mb-2">Énergie citoyenne</h3>
                    <p class="text-gray-600 mb-4">Coopératives énergétiques, rénovation durable... 38 projets actifs.</p>
                    <div class="flex items-center">
                        <div class="w-full bg-gray-200 rounded-full h-2">
                            <div class="bg-lime-500 h-2 rounded-full" style="width: 28%"></div>
                        </div>
                        <span class="ml-2 text-sm font-medium text-gray-500">28%</span>
                    </div>
                </div>
                
                <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100">
                    <div class="bg-lime-100 w-12 h-12 rounded-full flex items-center justify-center mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-lime-600">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 21v-8.25M15.75 21v-8.25M8.25 21v-8.25M3 9l9-6 9 6m-1.5 12V10.332A48.36 48.36 0 0012 9.75c-2.551 0-5.056.2-7.5.582V21M3 21h18M12 6.75h.008v.008H12V6.75z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold mb-2">Zéro déchet</h3>
                    <p class="text-gray-600 mb-4">Recycleries, consigne, épiceries vrac... 56 initiatives soutenues.</p>
                    <div class="flex items-center">
                        <div class="w-full bg-gray-200 rounded-full h-2">
                            <div class="bg-lime-500 h-2 rounded-full" style="width: 37%"></div>
                        </div>
                        <span class="ml-2 text-sm font-medium text-gray-500">37%</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Témoignages -->
    <section class="px-6 mb-20">
        <div class="container mx-auto max-w-6xl">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold mb-4">Ils ont changé notre région</h2>
                <div class="w-20 h-1 bg-lime-500 mx-auto mb-6"></div>
                <p class="text-gray-600 max-w-3xl mx-auto">Découvrez comment des citoyens comme vous transforment concrètement notre territoire.</p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Témoignage 1 -->
                <div class="bg-white p-8 rounded-xl shadow-sm border border-gray-100 relative">
                    <div class="absolute -top-5 left-8 text-lime-500 text-6xl">"</div>
                    <div class="relative z-10">
                        <p class="text-gray-600 mb-6 italic">Grâce à 142 contributeurs locaux, nous avons pu créer une recyclerie qui a déjà donné une seconde vie à 12 tonnes d'objets !</p>
                        <div class="flex items-center">
                            <img src="{{ asset('images/profile1.jpg') }}" alt="Jean M." class="w-12 h-12 object-cover rounded-full mr-4">
                            <div>
                                <p class="font-bold text-gray-900">Jean M.</p>
                                <p class="text-sm text-gray-500">Bénévole, La Recyclerie Verte</p>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Témoignage 2 -->
                <div class="bg-white p-8 rounded-xl shadow-sm border border-gray-100 relative">
                    <div class="absolute -top-5 left-8 text-lime-500 text-6xl">"</div>
                    <div class="relative z-10">
                        <p class="text-gray-600 mb-6 italic">Notre coopérative énergétique a été financée à 120% par des voisins. Aujourd'hui, 80 foyers consomment une électricité 100% locale.</p>
                        <div class="flex items-center">
                            <img src="{{ asset('images/profile3.jpg') }}" alt="Laura T." class="w-12 h-12 object-cover rounded-full mr-4">
                            <div>
                                <p class="font-bold text-gray-900">Laura T.</p>
                                <p class="text-sm text-gray-500">Présidente, Énergie Commune</p>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Témoignage 3 -->
                <div class="bg-white p-8 rounded-xl shadow-sm border border-gray-100 relative">
                    <div class="absolute -top-5 left-8 text-lime-500 text-6xl">"</div>
                    <div class="relative z-10">
                        <p class="text-gray-600 mb-6 italic">Avec seulement 15€ par mois, je soutiens 3 projets dans mon quartier. Je reçois chaque trimestre un rapport d'impact personnalisé.</p>
                        <div class="flex items-center">
                            <img src="{{ asset('images/profile2.jpg') }}" alt="Elodie Z." class="w-12 h-12 object-cover rounded-full mr-4">
                            <div>
                                <p class="font-bold text-gray-900">Elodie Z.</p>
                                <p class="text-sm text-gray-500">Contributrice depuis 2021</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Chiffres clés -->
    <section class="bg-gray-50 py-20 px-6 mb-20">
        <div class="container mx-auto max-w-6xl">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold mb-4">Notre impact en 2023</h2>
                <div class="w-20 h-1 bg-lime-500 mx-auto mb-6"></div>
                <p class="text-gray-600 max-w-3xl mx-auto">Des résultats concrets mesurés et vérifiés par notre observatoire indépendant.</p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <div class="bg-white p-8 rounded-xl shadow-sm border border-gray-100 text-center">
                    <div class="text-4xl font-bold text-lime-600 mb-2">287</div>
                    <p class="text-gray-700 font-medium">Projets financés</p>
                </div>
                
                <div class="bg-white p-8 rounded-xl shadow-sm border border-gray-100 text-center">
                    <div class="text-4xl font-bold text-lime-600 mb-2">4,5K</div>
                    <p class="text-gray-700 font-medium">Tonnes de CO2 évitées</p>
                </div>
                
                <div class="bg-white p-8 rounded-xl shadow-sm border border-gray-100 text-center">
                    <div class="text-4xl font-bold text-lime-600 mb-2">1,2K</div>
                    <p class="text-gray-700 font-medium">Emplois locaux créés</p>
                </div>
                
                <div class="bg-white p-8 rounded-xl shadow-sm border border-gray-100 text-center">
                    <div class="text-4xl font-bold text-lime-600 mb-2">92%</div>
                    <p class="text-gray-700 font-medium">Taux de réussite</p>
                </div>
            </div>
        </div>
    </section>
    @include('partials.call-to-action')
    @include('layouts.footer')
</x-app-layout>
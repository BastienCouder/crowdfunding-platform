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
                <h1 class="text-white text-3xl md:text-5xl font-bold mb-4">À propos de Fund</h1>
                <p class="text-white text-lg md:text-2xl font-medium max-w-2xl">Nous construisons un avenir où chaque projet méritant trouve son financement.</p>
            </div>
        </div>
    </section>

    <!-- Notre mission -->
    <section class="px-6 mb-20">
        <div class="container mx-auto max-w-6xl">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold mb-4">Notre mission</h2>
                <div class="w-20 h-1 bg-lime-500 mx-auto mb-6"></div>
                <p class="text-gray-600 max-w-3xl mx-auto">Chez Fund, nous croyons que chaque idée innovante mérite une chance de se réaliser. Notre mission est de démocratiser le financement participatif en créant une plateforme accessible, transparente et efficace qui connecte les porteurs de projets avec des contributeurs passionnés.</p>
            </div>
            
            <!-- Valeurs -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mt-12">
                <div class="bg-white p-8 rounded-xl shadow-sm border border-gray-100 text-center">
                    <div class="bg-lime-100 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-6">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8 text-lime-600">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M18 18.72a9.094 9.094 0 003.741-.479 3 3 0 00-4.682-2.72m.94 3.198l.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0112 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 016 18.719m12 0a5.971 5.971 0 00-.941-3.197m0 0A5.995 5.995 0 0012 12.75a5.995 5.995 0 00-5.058 2.772m0 0a3 3 0 00-4.681 2.72 8.986 8.986 0 003.74.477m.94-3.197a5.971 5.971 0 00-.94 3.197M15 6.75a3 3 0 11-6 0 3 3 0 016 0zm6 3a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0zm-13.5 0a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold mb-3">Communauté</h3>
                    <p class="text-gray-600">Nous construisons une communauté solidaire où chaque contribution, quelle que soit sa taille, fait une différence significative.</p>
                </div>
                
                <div class="bg-white p-8 rounded-xl shadow-sm border border-gray-100 text-center">
                    <div class="bg-lime-100 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-6">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8 text-lime-600">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 3v17.25m0 0c-1.472 0-2.882.265-4.185.75M12 20.25c1.472 0 2.882.265 4.185.75M18.75 4.97A48.416 48.416 0 0012 4.5c-2.291 0-4.545.16-6.75.47m13.5 0c1.01.143 2.01.317 3 .52m-3-.52l2.62 10.726c.122.499-.106 1.028-.589 1.202a5.988 5.988 0 01-2.031.352 5.988 5.988 0 01-2.031-.352c-.483-.174-.711-.703-.59-1.202L18.75 4.971zm-16.5.52c.99-.203 1.99-.377 3-.52m0 0l2.62 10.726c.122.499-.106 1.028-.589 1.202a5.989 5.989 0 01-2.031.352 5.989 5.989 0 01-2.031-.352c-.483-.174-.711-.703-.59-1.202L5.25 4.971z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold mb-3">Transparence</h3>
                    <p class="text-gray-600">Nous valorisons la transparence totale dans chaque projet, permettant aux contributeurs de suivre l'utilisation de leurs fonds.</p>
                </div>
                
                <div class="bg-white p-8 rounded-xl shadow-sm border border-gray-100 text-center">
                    <div class="bg-lime-100 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-6">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8 text-lime-600">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 13.5l10.5-11.25L12 10.5h8.25L9.75 21.75 12 13.5H3.75z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold mb-3">Innovation</h3>
                    <p class="text-gray-600">Nous encourageons l'innovation en fournissant les outils et le soutien nécessaires pour transformer les idées audacieuses en réalité.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Notre histoire -->
    <section class="bg-gray-50 py-20 px-6 mb-20">
        <div class="container mx-auto max-w-6xl">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-12 items-center">
                <div>
                    <h2 class="text-3xl font-bold mb-6">Notre histoire</h2>
                    <div class="w-20 h-1 bg-lime-500 mb-6"></div>
                    <p class="text-gray-600 mb-4">Fund a été fondé en 2018 par une équipe de passionnés d'entrepreneuriat social qui ont identifié un besoin crucial : créer un pont entre les innovateurs sociaux et les personnes désireuses de soutenir des causes qui leur tiennent à cœur.</p>
                    <p class="text-gray-600 mb-4">Ce qui a commencé comme une petite plateforme locale s'est rapidement transformé en une communauté mondiale de changemakers. Aujourd'hui, Fund a aidé à financer plus de 10 000 projets dans 45 pays, mobilisant plus de 50 millions d'euros pour des initiatives qui changent le monde.</p>
                    <p class="text-gray-600">Notre croissance témoigne de notre engagement envers notre mission et de la confiance que notre communauté place en nous. Chaque jour, nous travaillons à améliorer notre plateforme pour rendre le financement participatif encore plus accessible et efficace.</p>
                </div>
                <div class="relative">
                    <img src="{{ asset('images/growth-chart.jpg') }}" alt="Notre croissance" class="rounded-xl shadow-md w-full h-auto">
                    <div class="absolute -bottom-6 -left-6 bg-lime-500 text-white p-4 rounded-lg shadow-lg">
                        <p class="text-2xl font-bold">+200%</p>
                        <p class="text-sm">Croissance annuelle</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Notre équipe -->
    <section class="px-6 mb-20">
        <div class="container mx-auto max-w-6xl">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold mb-4">Notre équipe</h2>
                <div class="w-20 h-1 bg-lime-500 mx-auto mb-6"></div>
                <p class="text-gray-600 max-w-3xl mx-auto">Derrière Fund se trouve une équipe diversifiée de professionnels passionnés par l'impact social et l'innovation. Ensemble, nous travaillons pour faire de Fund la meilleure plateforme de financement participatif au monde.</p>
            </div>
            
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
                <!-- Membre d'équipe 1 -->
                <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden transition-transform duration-300 hover:-translate-y-2">
                    <img src="{{ asset('images/team-member-1.jpg') }}" alt="Sophie Martin" class="w-full h-64 object-cover">
                    <div class="p-6 text-center">
                        <h3 class="text-xl font-bold mb-1">Sophie Martin</h3>
                        <p class="text-lime-600 font-medium mb-3">Fondatrice & CEO</p>
                        <p class="text-gray-600 text-sm mb-4">Entrepreneure sociale avec 15 ans d'expérience dans le secteur à impact.</p>
                        <div class="flex justify-center space-x-3">
                            <a href="#" class="text-gray-400 hover:text-lime-600">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                    <path d="M8.29 20.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0022 5.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.072 4.072 0 012.8 9.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 012 18.407a11.616 11.616 0 006.29 1.84"></path>
                                </svg>
                            </a>
                            <a href="#" class="text-gray-400 hover:text-lime-600">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z" clip-rule="evenodd"></path>
                                </svg>
                            </a>
                            <a href="#" class="text-gray-400 hover:text-lime-600">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M12.315 2c2.43 0 2.784.013 3.808.06 1.064.049 1.791.218 2.427.465a4.902 4.902 0 011.772 1.153 4.902 4.902 0 011.153 1.772c.247.636.416 1.363.465 2.427.048 1.067.06 1.407.06 4.123v.08c0 2.643-.012 2.987-.06 4.043-.049 1.064-.218 1.791-.465 2.427a4.902 4.902 0 01-1.153 1.772 4.902 4.902 0 01-1.772 1.153c-.636.247-1.363.416-2.427.465-1.067.048-1.407.06-4.123.06h-.08c-2.643 0-2.987-.012-4.043-.06-1.064-.049-1.791-.218-2.427-.465a4.902 4.902 0 01-1.772-1.153 4.902 4.902 0 01-1.153-1.772c-.247-.636-.416-1.363-.465-2.427-.047-1.024-.06-1.379-.06-3.808v-.63c0-2.43.013-2.784.06-3.808.049-1.064.218-1.791.465-2.427a4.902 4.902 0 011.153-1.772A4.902 4.902 0 015.45 2.525c.636-.247 1.363-.416 2.427-.465C8.901 2.013 9.256 2 11.685 2h.63zm-.081 1.802h-.468c-2.456 0-2.784.011-3.807.058-.975.045-1.504.207-1.857.344-.467.182-.8.398-1.15.748-.35.35-.566.683-.748 1.15-.137.353-.3.882-.344 1.857-.047 1.023-.058 1.351-.058 3.807v.468c0 2.456.011 2.784.058 3.807.045.975.207 1.504.344 1.857.182.466.399.8.748 1.15.35.35.683.566 1.15.748.353.137.882.3 1.857.344 1.054.048 1.37.058 4.041.058h.08c2.597 0 2.917-.01 3.96-.058.976-.045 1.505-.207 1.858-.344.466-.182.8-.398 1.15-.748.35-.35.566-.683.748-1.15.137-.353.3-.882.344-1.857.048-1.055.058-1.37.058-4.041v-.08c0-2.597-.01-2.917-.058-3.96-.045-.976-.207-1.505-.344-1.858a3.097 3.097 0 00-.748-1.15 3.098 3.098 0 00-1.15-.748c-.353-.137-.882-.3-1.857-.344-1.023-.047-1.351-.058-3.807-.058zM12 6.865a5.135 5.135 0 110 10.27 5.135 5.135 0 010-10.27zm0 1.802a3.333 3.333 0 100 6.666 3.333 3.333 0 000-6.666zm5.338-3.205a1.2 1.2 0 110 2.4 1.2 1.2 0 010-2.4z" clip-rule="evenodd"></path>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
                
                <!-- Membre d'équipe 2 -->
                <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden transition-transform duration-300 hover:-translate-y-2">
                    <img src="{{ asset('images/team-member-2.jpg') }}" alt="Thomas Dubois" class="w-full h-64 object-cover">
                    <div class="p-6 text-center">
                        <h3 class="text-xl font-bold mb-1">Thomas Dubois</h3>
                        <p class="text-lime-600 font-medium mb-3">Directeur Technique</p>
                        <p class="text-gray-600 text-sm mb-4">Expert en technologies avec une passion pour les solutions innovantes à impact social.</p>
                        <div class="flex justify-center space-x-3">
                            <a href="#" class="text-gray-400 hover:text-lime-600">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                    <path d="M8.29 20.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0022 5.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.072 4.072 0 012.8 9.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 012 18.407a11.616 11.616 0 006.29 1.84"></path>
                                </svg>
                            </a>
                            <a href="#" class="text-gray-400 hover:text-lime-600">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z" clip-rule="evenodd"></path>
                                </svg>
                            </a>
                            <a href="#" class="text-gray-400 hover:text-lime-600">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M12.315 2c2.43 0 2.784.013 3.808.06 1.064.049 1.791.218 2.427.465a4.902 4.902 0 011.772 1.153 4.902 4.902 0 011.153 1.772c.247.636.416 1.363.465 2.427.048 1.067.06 1.407.06 4.123v.08c0 2.643-.012 2.987-.06 4.043-.049 1.064-.218 1.791-.465 2.427a4.902 4.902 0 01-1.153 1.772 4.902 4.902 0 01-1.772 1.153c-.636.247-1.363.416-2.427.465-1.067.048-1.407.06-4.123.06h-.08c-2.643 0-2.987-.012-4.043-.06-1.064-.049-1.791-.218-2.427-.465a4.902 4.902 0 01-1.772-1.153 4.902 4.902 0 01-1.153-1.772c-.247-.636-.416-1.363-.465-2.427-.047-1.024-.06-1.379-.06-3.808v-.63c0-2.43.013-2.784.06-3.808.049-1.064.218-1.791.465-2.427a4.902 4.902 0 011.153-1.772A4.902 4.902 0 015.45 2.525c.636-.247 1.363-.416 2.427-.465C8.901 2.013 9.256 2 11.685 2h.63zm-.081 1.802h-.468c-2.456 0-2.784.011-3.807.058-.975.045-1.504.207-1.857.344-.467.182-.8.398-1.15.748-.35.35-.566.683-.748 1.15-.137.353-.3.882-.344 1.857-.047 1.023-.058 1.351-.058 3.807v.468c0 2.456.011 2.784.058 3.807.045.975.207 1.504.344 1.857.182.466.399.8.748 1.15.35.35.683.566 1.15.748.353.137.882.3 1.857.344 1.054.048 1.37.058 4.041.058h.08c2.597 0 2.917-.01 3.96-.058.976-.045 1.505-.207 1.858-.344.466-.182.8-.398 1.15-.748.35-.35.566-.683.748-1.15.137-.353.3-.882.344-1.857.048-1.055.058-1.37.058-4.041v-.08c0-2.597-.01-2.917-.058-3.96-.045-.976-.207-1.505-.344-1.858a3.097 3.097 0 00-.748-1.15 3.098 3.098 0 00-1.15-.748c-.353-.137-.882-.3-1.857-.344-1.023-.047-1.351-.058-3.807-.058zM12 6.865a5.135 5.135 0 110 10.27 5.135 5.135 0 010-10.27zm0 1.802a3.333 3.333 0 100 6.666 3.333 3.333 0 000-6.666zm5.338-3.205a1.2 1.2 0 110 2.4 1.2 1.2 0 010-2.4z" clip-rule="evenodd"></path>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
                
                <!-- Membre d'équipe 3 -->
                <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden transition-transform duration-300 hover:-translate-y-2">
                    <img src="{{ asset('images/team-member-3.jpg') }}" alt="Léa Moreau" class="w-full h-64 object-cover">
                    <div class="p-6 text-center">
                        <h3 class="text-xl font-bold mb-1">Léa Moreau</h3>
                        <p class="text-lime-600 font-medium mb-3">Directrice des Opérations</p>
                        <p class="text-gray-600 text-sm mb-4">Spécialiste en gestion de projets avec une expertise en développement durable.</p>
                        <div class="flex justify-center space-x-3">
                            <a href="#" class="text-gray-400 hover:text-lime-600">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                    <path d="M8.29 20.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0022 5.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.072 4.072 0 012.8 9.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 012 18.407a11.616 11.616 0 006.29 1.84"></path>
                                </svg>
                            </a>
                            <a href="#" class="text-gray-400 hover:text-lime-600">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z" clip-rule="evenodd"></path>
                                </svg>
                            </a>
                            <a href="#" class="text-gray-400 hover:text-lime-600">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M12.315 2c2.43 0 2.784.013 3.808.06 1.064.049 1.791.218 2.427.465a4.902 4.902 0 011.772 1.153 4.902 4.902 0 011.153 1.772c.247.636.416 1.363.465 2.427.048 1.067.06 1.407.06 4.123v.08c0 2.643-.012 2.987-.06 4.043-.049 1.064-.218 1.791-.465 2.427a4.902 4.902 0 01-1.153 1.772 4.902 4.902 0 01-1.772 1.153c-.636.247-1.363.416-2.427.465-1.067.048-1.407.06-4.123.06h-.08c-2.643 0-2.987-.012-4.043-.06-1.064-.049-1.791-.218-2.
427-.465a4.902 4.902 0 01-1.772-1.153 4.902 4.902 0 01-1.153-1.772c-.247-.636-.416-1.363-.465-2.427-.047-1.024-.06-1.379-.06-3.808v-.63c0-2.43.013-2.784.06-3.808.049-1.064.218-1.791.465-2.427a4.902 4.902 0 011.153-1.772A4.902 4.902 0 015.45 2.525c.636-.247 1.363-.416 2.427-.465C8.901 2.013 9.256 2 11.685 2h.63zm-.081 1.802h-.468c-2.456 0-2.784.011-3.807.058-.975.045-1.504.207-1.857.344-.467.182-.8.398-1.15.748-.35.35-.566.683-.748 1.15-.137.353-.3.882-.344 1.857-.047 1.023-.058 1.351-.058 3.807v.468c0 2.456.011 2.784.058 3.807.045.975.207 1.504.344 1.857.182.466.399.8.748 1.15.35.35.683.566 1.15.748.353.137.882.3 1.857.344 1.054.048 1.37.058 4.041.058h.08c2.597 0 2.917-.01 3.96-.058.976-.045 1.505-.207 1.858-.344.466-.182.8-.398 1.15-.748.35-.35.566-.683.748-1.15.137-.353.3-.882.344-1.857.048-1.055.058-1.37.058-4.041v-.08c0-2.597-.01-2.917-.058-3.96-.045-.976-.207-1.505-.344-1.858a3.097 3.097 0 00-.748-1.15 3.098 3.098 0 00-1.15-.748c-.353-.137-.882-.3-1.857-.344-1.023-.047-1.351-.058-3.807-.058zM12 6.865a5.135 5.135 0 110 10.27 5.135 5.135 0 010-10.27zm0 1.802a3.333 3.333 0 100 6.666 3.333 3.333 0 000-6.666zm5.338-3.205a1.2 1.2 0 110 2.4 1.2 1.2 0 010-2.4z" clip-rule="evenodd"></path>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
                
                <!-- Membre d'équipe 4 -->
                <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden transition-transform duration-300 hover:-translate-y-2">
                    <img src="{{ asset('images/team-member-4.jpg') }}" alt="Alexandre Chen" class="w-full h-64 object-cover">
                    <div class="p-6 text-center">
                        <h3 class="text-xl font-bold mb-1">Alexandre Chen</h3>
                        <p class="text-lime-600 font-medium mb-3">Responsable Marketing</p>
                        <p class="text-gray-600 text-sm mb-4">Stratège marketing créatif avec une expertise en communication d'impact.</p>
                        <div class="flex justify-center space-x-3">
                            <a href="#" class="text-gray-400 hover:text-lime-600">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                    <path d="M8.29 20.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0022 5.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.072 4.072 0 012.8 9.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 012 18.407a11.616 11.616 0 006.29 1.84"></path>
                                </svg>
                            </a>
                            <a href="#" class="text-gray-400 hover:text-lime-600">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z" clip-rule="evenodd"></path>
                                </svg>
                            </a>
                            <a href="#" class="text-gray-400 hover:text-lime-600">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M12.315 2c2.43 0 2.784.013 3.808.06 1.064.049 1.791.218 2.427.465a4.902 4.902 0 011.772 1.153 4.902 4.902 0 011.153 1.772c.247.636.416 1.363.465 2.427.048 1.067.06 1.407.06 4.123v.08c0 2.643-.012 2.987-.06 4.043-.049 1.064-.218 1.791-.465 2.427a4.902 4.902 0 01-1.153 1.772 4.902 4.902 0 01-1.772 1.153c-.636.247-1.363.416-2.427.465-1.067.048-1.407.06-4.123.06h-.08c-2.643 0-2.987-.012-4.043-.06-1.064-.049-1.791-.218-2.427-.465a4.902 4.902 0 01-1.772-1.153 4.902 4.902 0 01-1.153-1.772c-.247-.636-.416-1.363-.465-2.427-.047-1.024-.06-1.379-.06-3.808v-.63c0-2.43.013-2.784.06-3.808.049-1.064.218-1.791.465-2.427a4.902 4.902 0 011.153-1.772A4.902 4.902 0 015.45 2.525c.636-.247 1.363-.416 2.427-.465C8.901 2.013 9.256 2 11.685 2h.63zm-.081 1.802h-.468c-2.456 0-2.784.011-3.807.058-.975.045-1.504.207-1.857.344-.467.182-.8.398-1.15.748-.35.35-.566.683-.748 1.15-.137.353-.3.882-.344 1.857-.047 1.023-.058 1.351-.058 3.807v.468c0 2.456.011 2.784.058 3.807.045.975.207 1.504.344 1.857.182.466.399.8.748 1.15.35.35.683.566 1.15.748.353.137.882.3 1.857.344 1.054.048 1.37.058 4.041.058h.08c2.597 0 2.917-.01 3.96-.058.976-.045 1.505-.207 1.858-.344.466-.182.8-.398 1.15-.748.35-.35.566-.683.748-1.15.137-.353.3-.882.344-1.857.048-1.055.058-1.37.058-4.041v-.08c0-2.597-.01-2.917-.058-3.96-.045-.976-.207-1.505-.344-1.858a3.097 3.097 0 00-.748-1.15 3.098 3.098 0 00-1.15-.748c-.353-.137-.882-.3-1.857-.344-1.023-.047-1.351-.058-3.807-.058zM12 6.865a5.135 5.135 0 110 10.27 5.135 5.135 0 010-10.27zm0 1.802a3.333 3.333 0 100 6.666 3.333 3.333 0 000-6.666zm5.338-3.205a1.2 1.2 0 110 2.4 1.2 1.2 0 010-2.4z" clip-rule="evenodd"></path>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Notre impact -->
    <section class="bg-gray-50 py-20 px-6 mb-20">
        <div class="container mx-auto max-w-6xl">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold mb-4">Notre impact</h2>
                <div class="w-20 h-1 bg-lime-500 mx-auto mb-6"></div>
                <p class="text-gray-600 max-w-3xl mx-auto">Chaque jour, Fund aide des projets innovants à prendre vie et à créer un impact positif dans le monde. Voici quelques chiffres qui témoignent de notre impact collectif.</p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 mb-12">
                <div class="bg-white p-8 rounded-xl shadow-sm border border-gray-100 text-center">
                    <div class="text-4xl font-bold text-lime-600 mb-2">10,000+</div>
                    <p class="text-gray-700 font-medium">Projets financés</p>
                </div>
                
                <div class="bg-white p-8 rounded-xl shadow-sm border border-gray-100 text-center">
                    <div class="text-4xl font-bold text-lime-600 mb-2">€50M+</div>
                    <p class="text-gray-700 font-medium">Fonds collectés</p>
                </div>
                
                <div class="bg-white p-8 rounded-xl shadow-sm border border-gray-100 text-center">
                    <div class="text-4xl font-bold text-lime-600 mb-2">500,000+</div>
                    <p class="text-gray-700 font-medium">Contributeurs</p>
                </div>
                
                <div class="bg-white p-8 rounded-xl shadow-sm border border-gray-100 text-center">
                    <div class="text-4xl font-bold text-lime-600 mb-2">45</div>
                    <p class="text-gray-700 font-medium">Pays impactés</p>
                </div>
            </div>
            
            <!-- Catégories d'impact -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100">
                    <div class="bg-lime-100 w-12 h-12 rounded-full flex items-center justify-center mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-lime-600">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 18v-5.25m0 0a6.01 6.01 0 001.5-.189m-1.5.189a6.01 6.01 0 01-1.5-.189m3.75 7.478a12.06 12.06 0 01-4.5 0m3.75 2.383a14.406 14.406 0 01-3 0M14.25 18v-.192c0-.983.658-1.823 1.508-2.316a7.5 7.5 0 10-7.517 0c.85.493 1.509 1.333 1.509 2.316V18" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold mb-2">Innovation sociale</h3>
                    <p class="text-gray-600 mb-4">Nous avons soutenu plus de 3 000 projets d'innovation sociale qui répondent aux défis sociétaux les plus pressants.</p>
                    <div class="flex items-center">
                        <div class="w-full bg-gray-200 rounded-full h-2">
                            <div class="bg-lime-500 h-2 rounded-full" style="width: 75%"></div>
                        </div>
                        <span class="ml-2 text-sm font-medium text-gray-500">75%</span>
                    </div>
                </div>
                
                <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100">
                    <div class="bg-lime-100 w-12 h-12 rounded-full flex items-center justify-center mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-lime-600">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 21a9.004 9.004 0 008.716-6.747M12 21a9.004 9.004 0 01-8.716-6.747M12 21c2.485 0 4.5-4.03 4.5-9S14.485 3 12 3m0 18c-2.485 0-4.5-4.03-4.5-9S9.515 3 12 3m0 0a8.997 8.997 0 017.843 4.582M12 3a8.997 8.997 0 00-7.843 4.582m15.686 0A11.953 11.953 0 0112 10.5c-2.998 0-5.74-1.1-7.843-2.918m15.686 0A8.959 8.959 0 0121 12c0 .778-.099 1.533-.284 2.253m0 0A17.919 17.919 0 0112 16.5c-3.162 0-6.133-.815-8.716-2.247m0 0A9.015 9.015 0 013 12c0-1.605.42-3.113 1.157-4.418" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold mb-2">Environnement</h3>
                    <p class="text-gray-600 mb-4">Plus de 2 500 projets environnementaux ont été financés, contribuant à la lutte contre le changement climatique.</p>
                    <div class="flex items-center">
                        <div class="w-full bg-gray-200 rounded-full h-2">
                            <div class="bg-lime-500 h-2 rounded-full" style="width: 60%"></div>
                        </div>
                        <span class="ml-2 text-sm font-medium text-gray-500">60%</span>
                    </div>
                </div>
                
                <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100">
                    <div class="bg-lime-100 w-12 h-12 rounded-full flex items-center justify-center mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-lime-600">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 18v-5.25m0 0a6.01 6.01 0 001.5-.189m-1.5.189a6.01 6.01 0 01-1.5-.189m3.75 7.478a12.06 12.06 0 01-4.5 0m3.75 2.383a14.406 14.406 0 01-3 0M14.25 18v-.192c0-.983.658-1.823 1.508-2.316a7.5 7.5 0 10-7.517 0c.85.493 1.509 1.333 1.509 2.316V18" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold mb-2">Éducation</h3>
                    <p class="text-gray-600 mb-4">Nous avons aidé à financer plus de 1 800 projets éducatifs, touchant plus de 500 000 apprenants dans le monde.</p>
                    <div class="flex items-center">
                        <div class="w-full bg-gray-200 rounded-full h-2">
                            <div class="bg-lime-500 h-2 rounded-full" style="width: 45%"></div>
                        </div>
                        <span class="ml-2 text-sm font-medium text-gray-500">45%</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Témoignages -->
    <section class="px-6 mb-20">
        <div class="container mx-auto max-w-6xl">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold mb-4">Ce que disent nos utilisateurs</h2>
                <div class="w-20 h-1 bg-lime-500 mx-auto mb-6"></div>
                <p class="text-gray-600 max-w-3xl mx-auto">Découvrez les témoignages de porteurs de projets et de contributeurs qui ont utilisé Fund pour donner vie à leurs idées ou soutenir des causes qui leur tiennent à cœur.</p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Témoignage 1 -->
                <div class="bg-white p-8 rounded-xl shadow-sm border border-gray-100 relative">
                    <div class="absolute -top-5 left-8 text-lime-500 text-6xl">"</div>
                    <div class="relative z-10">
                        <p class="text-gray-600 mb-6 italic">Fund a été un partenaire incroyable pour notre projet environnemental. Grâce à leur plateforme, nous avons pu collecter 50% de plus que notre objectif initial !</p>
                        <div class="flex items-center">
                            <img src="{{ asset('images/testimonial-1.jpg') }}" alt="Marie Dupont" class="w-12 h-12 rounded-full mr-4">
                            <div>
                                <p class="font-bold text-gray-900">Marie Dupont</p>
                                <p class="text-sm text-gray-500">Fondatrice, EcoSolutions</p>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Témoignage 2 -->
                <div class="bg-white p-8 rounded-xl shadow-sm border border-gray-100 relative">
                    <div class="absolute -top-5 left-8 text-lime-500 text-6xl">"</div>
                    <div class="relative z-10">
                        <p class="text-gray-600 mb-6 italic">En tant que contributeur régulier, j'apprécie la transparence et la facilité d'utilisation de Fund. Je peux suivre l'impact de mes contributions en temps réel.</p>
                        <div class="flex items-center">
                            <img src="{{ asset('images/testimonial-2.jpg') }}" alt="Paul Lefèvre" class="w-12 h-12 rounded-full mr-4">
                            <div>
                                <p class="font-bold text-gray-900">Paul Lefèvre</p>
                                <p class="text-sm text-gray-500">Contributeur</p>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Témoignage 3 -->
                <div class="bg-white p-8 rounded-xl shadow-sm border border-gray-100 relative">
                    <div class="absolute -top-5 left-8 text-lime-500 text-6xl">"</div>
                    <div class="relative z-10">
                        <p class="text-gray-600 mb-6 italic">Fund nous a permis de transformer notre idée en réalité. Leur équipe nous a accompagnés à chaque étape, rendant le processus de collecte de fonds simple et efficace.</p>
                        <div class="flex items-center">
                            <img src="{{ asset('images/testimonial-3.jpg') }}" alt="Sarah Benali" class="w-12 h-12 rounded-full mr-4">
                            <div>
                                <p class="font-bold text-gray-900">Sarah Benali</p>
                                <p class="text-sm text-gray-500">Co-fondatrice, TechForGood</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Partenaires -->
    <section class="bg-gray-50 py-20 px-6 mb-20">
        <div class="container mx-auto max-w-6xl">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold mb-4">Nos partenaires</h2>
                <div class="w-20 h-1 bg-lime-500 mx-auto mb-6"></div>
                <p class="text-gray-600 max-w-3xl mx-auto">Nous collaborons avec des organisations de premier plan pour maximiser notre impact et offrir les meilleures opportunités à notre communauté.</p>
            </div>
            
            <div class="grid grid-cols-2 md:grid-cols-4 gap-8 items-center">
                <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100 flex items-center justify-center h-24">
                    <img src="{{ asset('images/partner-1.png') }}" alt="Partenaire 1" class="max-h-12">
                </div>
                <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100 flex items-center justify-center h-24">
                    <img src="{{ asset('images/partner-2.png') }}" alt="Partenaire 2" class="max-h-12">
                </div>
                <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100 flex items-center justify-center h-24">
                    <img src="{{ asset('images/partner-3.png') }}" alt="Partenaire 3" class="max-h-12">
                </div>
                <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100 flex items-center justify-center h-24">
                    <img src="{{ asset('images/partner-4.png') }}" alt="Partenaire 4" class="max-h-12">
                </div>
            </div>
        </div>
    </section>
    @include('partials.call-to-action')
    @include('layouts.footer')
</x-app-layout>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenue sur NomDeVotrePlateforme</title>
    @vite('resources/css/app.css')
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
</head>
<body class="font-sans bg-gray-50 text-gray-900">
    <header class="bg-white shadow-sm">
        <nav class="container mx-auto px-4 py-4 flex justify-between items-center">
            <a href="#" class="text-2xl font-bold text-blue-600">Logo</a>
            <div class="hidden md:flex space-x-6">
                <a href="#features" class="text-gray-600 hover:text-blue-600 transition">Fonctionnalités</a>
                <a href="#how-it-works" class="text-gray-600 hover:text-blue-600 transition">Comment ça marche</a>
                <a href="#testimonials" class="text-gray-600 hover:text-blue-600 transition">Témoignages</a>
            </div>
            <div class="flex space-x-4">
                <a href="{{ route('login') }}" class="px-4 py-2 text-blue-600 border border-blue-600 rounded-lg hover:bg-blue-50 transition">Connexion</a>
                <a href="{{ route('register') }}" class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition">Inscription</a>
            </div>
        </nav>
    </header>

    <main>
        <!-- Hero Section -->
        <section class="bg-gradient-to-r from-blue-600 to-indigo-700 text-white py-20 px-5 md:px-20">
            <div class="container mx-auto px-4 flex flex-col md:flex-row items-center">
                <div class="md:w-1/2 mb-10 md:mb-0">
                    <h1 class="text-4xl md:text-5xl font-bold mb-6">Réalisez vos projets avec le soutien de la communauté</h1>
                    <p class="text-xl mb-8">Lancez votre campagne de financement participatif et donnez vie à vos idées.</p>
                    <a href="{{ route('register') }}" class="px-8 py-3 bg-white text-blue-600 rounded-full text-lg font-semibold hover:bg-gray-100 transition">Commencer maintenant</a>
                </div>
                <div class="md:w-1/2">
                    <img src="https://via.placeholder.com/600x400" alt="Hero Image" class="rounded-lg shadow-xl">
                </div>
            </div>
        </section>

        <!-- Features Section -->
        <section id="features" class="py-20 bg-white px-5 md:px-20">
            <div class="container mx-auto px-4">
                <h2 class="text-3xl font-bold text-center mb-12">Pourquoi choisir notre plateforme ?</h2>
                <div class="grid md:grid-cols-3 gap-8">
                    <div class="text-center">
                        <div class="bg-blue-100 rounded-full p-4 inline-block mb-4">
                            <svg class="w-10 h-10 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg>
                        </div>
                        <h3 class="text-xl font-semibold mb-2">Facile à utiliser</h3>
                        <p class="text-gray-600">Créez votre campagne en quelques clics et partagez-la facilement.</p>
                    </div>
                    <div class="text-center">
                        <div class="bg-green-100 rounded-full p-4 inline-block mb-4">
                            <svg class="w-10 h-10 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        </div>
                        <h3 class="text-xl font-semibold mb-2">Sécurisé</h3>
                        <p class="text-gray-600">Transactions sécurisées et protection des données garanties.</p>
                    </div>
                    <div class="text-center">
                        <div class="bg-purple-100 rounded-full p-4 inline-block mb-4">
                            <svg class="w-10 h-10 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                        </div>
                        <h3 class="text-xl font-semibold mb-2">Communauté active</h3>
                        <p class="text-gray-600">Rejoignez une communauté dynamique prête à soutenir vos projets.</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- How It Works Section -->
        <section id="how-it-works" class="py-20 bg-gray-100 px-5 md:px-20">
            <div class="container mx-auto px-4">
                <h2 class="text-3xl font-bold text-center mb-12">Comment ça marche ?</h2>
                <div class="flex flex-col md:flex-row justify-between items-center space-y-8 md:space-y-0 md:space-x-8">
                    <div class="bg-white rounded-lg shadow-md p-6 flex-1">
                        <div class="text-3xl font-bold text-blue-600 mb-4">1</div>
                        <h3 class="text-xl font-semibold mb-2">Créez votre projet</h3>
                        <p class="text-gray-600">Décrivez votre idée, fixez un objectif de financement et une durée.</p>
                    </div>
                    <div class="bg-white rounded-lg shadow-md p-6 flex-1">
                        <div class="text-3xl font-bold text-blue-600 mb-4">2</div>
                        <h3 class="text-xl font-semibold mb-2">Partagez votre campagne</h3>
                        <p class="text-gray-600">Utilisez les réseaux sociaux et votre réseau pour promouvoir votre projet.</p>
                    </div>
                    <div class="bg-white rounded-lg shadow-md p-6 flex-1">
                        <div class="text-3xl font-bold text-blue-600 mb-4">3</div>
                        <h3 class="text-xl font-semibold mb-2">Collectez les fonds</h3>
                        <p class="text-gray-600">Recevez les contributions et tenez vos soutiens informés de l'avancement.</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Testimonials Section -->
        <section id="testimonials" class="py-20 bg-white px-5 md:px-20">
            <div class="container mx-auto px-4">
                <h2 class="text-3xl font-bold text-center mb-12">Ce que disent nos utilisateurs</h2>
                <div class="grid md:grid-cols-2 gap-8">
                    <div class="bg-gray-100 p-6 rounded-lg">
                        <p class="text-gray-600 mb-4">"Grâce à cette plateforme, j'ai pu financer mon projet de livre en seulement 3 semaines. L'interface est intuitive et la communauté très réactive !"</p>
                        <div class="flex items-center">
                            <img src="https://via.placeholder.com/60" alt="User" class="rounded-full mr-4">
                            <div>
                                <h4 class="font-semibold">Marie Dupont</h4>
                                <p class="text-gray-500">Auteure indépendante</p>
                            </div>
                        </div>
                    </div>
                    <div class="bg-gray-100 p-6 rounded-lg">
                        <p class="text-gray-600 mb-4">"J'ai été impressionné par la facilité d'utilisation et le support client. Mon projet de jeu vidéo a dépassé son objectif en un temps record !"</p>
                        <div class="flex items-center">
                            <img src="https://via.placeholder.com/60" alt="User" class="rounded-full mr-4">
                            <div>
                                <h4 class="font-semibold">Thomas Martin</h4>
                                <p class="text-gray-500">Développeur de jeux</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="bg-blue-600 text-white py-20">
            <div class="container mx-auto px-4 text-center">
                <h2 class="text-3xl font-bold mb-6">Prêt à lancer votre projet ?</h2>
                <p class="text-xl mb-8">Rejoignez notre communauté et donnez vie à vos idées dès aujourd'hui.</p>
                <a href="{{ route('register') }}" class="px-8 py-3 bg-white text-blue-600 rounded-full text-lg font-semibold hover:bg-gray-100 transition">Créer mon compte gratuitement</a>
            </div>
        </section>
    </main>

    <footer class="bg-gray-800 text-white py-10 px-5 md:px-20">
        <div class="container mx-auto px-4">
            <div class="flex flex-wrap justify-between">
                <div class="w-full md:w-1/4 mb-6 md:mb-0">
                    <h3 class="text-xl font-semibold mb-4">NomDeVotrePlateforme</h3>
                    <p class="text-gray-400 pr-20">Donnez vie à vos projets grâce au financement participatif.</p>
                </div>
                <div class="w-full md:w-1/4 mb-6 md:mb-0">
                    <h4 class="text-lg font-semibold mb-4">Liens rapides</h4>
                    <ul class="space-y-2">
                        <li><a href="#" class="text-gray-400 hover:text-white transition">À propos</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition">Comment ça marche</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition">Projets</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition">FAQ</a></li>
                    </ul>
                </div>
                <div class="w-full md:w-1/4 mb-6 md:mb-0">
                    <h4 class="text-lg font-semibold mb-4">Nous contacter</h4>
                    <p class="text-gray-400">Email : contact@votreplateforme.com</p>
                    <p class="text-gray-400">Tél : +33 1 23 45 67 89</p>
                </div>
                <div class="w-full md:w-1/4">
                    <h4 class="text-lg font-semibold mb-4">Suivez-nous</h4>
                    <div class="flex space-x-4">
                        <a href="#" class="text-gray-400 hover:text-white transition">
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-white transition">
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z"/></svg>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-white transition">
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M12 0C8.74 0 8.333.015 7.053.072 5.775.132 4.905.333 4.14.63c-.789.306-1.459.717-2.126 1.384S.935 3.35.63 4.14C.333 4.905.131 5.775.072 7.053.012 8.333 0 8.74 0 12s.015 3.667.072 4.947c.06 1.277.261 2.148.558 2.913.306.788.717 1.459 1.384 2.126.667.666 1.336 1.079 2.126 1.384.766.296 1.636.499 2.913.558C8.333 23.988 8.74 24 12 24s3.667-.015 4.947-.072c1.277-.06 2.148-.262 2.913-.558.788-.306 1.459-.718 2.126-1.384.666-.667 1.079-1.335 1.384-2.126.296-.765.499-1.636.558-2.913.06-1.28.072-1.687.072-4.947s-.015-3.667-.072-4.947c-.06-1.277-.262-2.149-.558-2.913-.306-.789-.718-1.459-1.384-2.126C21.319 1.347 20.651.935 19.86.63c-.765-.297-1.636-.499-2.913-.558C15.667.012 15.26 0 12 0zm0 2.16c3.203 0 3.585.016 4.85.071 1.17.055 1.805.249 2.227.415.562.217.96.477 1.382.896.419.42.679.819.896 1.381.164.422.36 1.057.413 2.227.057 1.266.07 1.646.07 4.85s-.015 3.585-.074 4.85c-.061 1.17-.256 1.805-.421 2.227-.224.562-.479.96-.899 1.382-.419.419-.824.679-1.38.896-.42.164-1.065.36-2.235.413-1.274.057-1.649.07-4.859.07-3.211 0-3.586-.015-4.859-.074-1.171-.061-1.816-.256-2.236-.421-.569-.224-.96-.479-1.379-.899-.421-.419-.69-.824-.9-1.38-.165-.42-.359-1.065-.42-2.235-.045-1.26-.061-1.649-.061-4.844 0-3.196.016-3.586.061-4.861.061-1.17.255-1.814.42-2.234.21-.57.479-.96.9-1.381.419-.419.81-.689 1.379-.898.42-.166 1.051-.361 2.221-.421 1.275-.045 1.65-.06 4.859-.06l.045.03zm0 3.678c-3.405 0-6.162 2.76-6.162 6.162 0 3.405 2.76 6.162 6.162 6.162 3.405 0 6.162-2.76 6.162-6.162 0-3.405-2.76-6.162-6.162-6.162zM12 16c-2.21 0-4-1.79-4-4s1.79-4 4-4 4 1.79 4 4-1.79 4-4 4zm7.846-10.405c0 .795-.646 1.44-1.44 1.44-.795 0-1.44-.646-1.44-1.44 0-.794.646-1.439 1.44-1.439.793-.001 1.44.645 1.44 1.439z"/></svg>
                        </a>
                    </div>
                </div>
            </div>
            <div class="border-t border-gray-700 mt-8 pt-8 text-center">
                <p class="text-gray-400">&copy; 2025 EcoFund. Tous droits réservés.</p>
            </div>
        </div>
    </footer>
</body>
</html>


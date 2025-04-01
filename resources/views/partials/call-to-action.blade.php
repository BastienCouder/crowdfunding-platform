<section class="px-6 mb-20">
    <div class="container mx-auto max-w-6xl">
        <div class="bg-lime-300 rounded-xl p-12 text-center relative overflow-hidden">
            <div class="absolute top-0 left-0 w-40 h-40 bg-lime-500 rounded-full opacity-20 -translate-x-1/2 -translate-y-1/2"></div>
            <div class="absolute bottom-0 right-0 w-60 h-60 bg-lime-500 rounded-full opacity-20 translate-x-1/3 translate-y-1/3"></div>
                
                <div class="relative z-10">
                    <h2 class="text-3xl font-bold text-fg mb-4">Prêt à lancer votre projet ?</h2>
                    <p class="text-fg text-lg mb-8 max-w-2xl mx-auto">Rejoignez notre communauté de changemakers et donnez vie à vos idées grâce au financement participatif.</p>
                    <div class="flex flex-col sm:flex-row gap-4 justify-center">
                        <a href="{{ route('projects.create') }}" class="bg-white text-lime-600 hover:bg-gray-100 px-6 py-3 rounded-full text-lg font-medium inline-block">
                            Lancer un projet
                        </a>
                        <a href="{{ route('projects.index') }}" class="bg-lime-600 text-white hover:bg-lime-700 px-6 py-3 rounded-full text-lg font-medium inline-block">
                            Découvrir les projets
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

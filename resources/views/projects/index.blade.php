<x-app-layout>
@include('layouts.navigation')
    <div class="bg-white min-h-screen">
        <!-- Hero Section -->
        <div class="relative bg-gray-50 pt-16 pb-12">
            <div class="container mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
                <div class="text-center max-w-3xl mx-auto">
                    <div class="inline-block rounded-lg bg-lime-100 px-3 py-1 text-sm text-lime-700 mb-4">
                        Nos initiatives
                    </div>
                    <h1 class="text-4xl md:text-5xl font-bold text-gray-900 mb-4">Découvrez nos projets</h1>
                    <p class="text-lg text-gray-600 mb-8">
                        Soutenez des causes qui vous tiennent à cœur et faites une différence concrète dans la vie des autres.
                    </p>
                </div>
            </div>
            <!-- Decorative elements -->
            <div class="absolute left-0 top-0 w-32 h-32 bg-lime-50 rounded-full -translate-x-1/2 -translate-y-1/2 opacity-50"></div>
            <div class="absolute right-0 bottom-0 w-48 h-48 bg-lime-50 rounded-full translate-x-1/3 translate-y-1/3 opacity-50"></div>
        </div>

        <!-- Projects Grid -->
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach ($projects as $project)
                    <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden transition duration-300 ease-in-out transform hover:-translate-y-2 hover:shadow-md">
                        <div class="relative">
                            @if ($project->images && count($project->images) > 0)
                                <img src="{{ $project->images[0]->image_url }}" alt="{{ $project->title }}" class="w-full h-52 object-cover">
                            @else
                                <div class="w-full h-52 bg-gray-100 flex items-center justify-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-12 h-12 text-gray-300">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 15.75l5.159-5.159a2.25 2.25 0 013.182 0l5.159 5.159m-1.5-1.5l1.409-1.409a2.25 2.25 0 013.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 001.5-1.5V6a1.5 1.5 0 00-1.5-1.5H3.75A1.5 1.5 0 002.25 6v12a1.5 1.5 0 001.5 1.5zm10.5-11.25h.008v.008h-.008V8.25zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z" />
                                    </svg>
                                </div>
                            @endif
                            <div class="absolute top-4 right-4 bg-white rounded-full px-3 py-1 text-xs font-medium shadow-sm">
                                {{ round(($project->current_amount / $project->goal_amount) * 100) }}% financé
                            </div>
                        </div>
                        
                        <div class="p-6">
                            <h2 class="text-xl font-bold text-gray-800 mb-2 line-clamp-1">{{ $project->title }}</h2>
                            <p class="text-gray-600 mb-6 text-sm line-clamp-3">{{ $project->description }}</p>
                            
                            <div class="mb-4">
                                <div class="w-full bg-gray-100 rounded-full h-2">
                                    <div class="bg-lime-500 h-2 rounded-full" style="width: {{ min(($project->current_amount / $project->goal_amount) * 100, 100) }}%"></div>
                                </div>
                            </div>
                            
                            <div class="flex justify-between items-center mb-6 text-sm">
                                <div>
                                    <span class="text-gray-500 block">Objectif</span>
                                    <span class="font-bold text-gray-800">{{ number_format($project->goal_amount, 0, ',', ' ') }} €</span>
                                </div>
                                <div class="text-right">
                                    <span class="text-gray-500 block">Collectés</span>
                                    <span class="font-bold text-lime-600">{{ number_format($project->current_amount, 0, ',', ' ') }} €</span>
                                </div>
                            </div>
                            
                            <a href="{{ route('projects.show', $project) }}" class="block w-full bg-lime-500 hover:bg-lime-600 text-white text-center py-3 rounded-lg transition duration-300 font-medium">
                                Voir le projet
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
            
            <!-- Empty state if no projects -->
            @if(count($projects) === 0)
                <div class="text-center py-16">
                    <div class="bg-lime-50 inline-flex rounded-full p-4 mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8 text-lime-500">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126zM12 15.75h.007v.008H12v-.008z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-2">Aucun projet disponible</h3>
                    <p class="text-gray-600 mb-8">Revenez bientôt pour découvrir nos nouveaux projets.</p>
                </div>
            @endif
            
            <!-- Pagination -->
            <div class="mt-12">
                {{ $projects->links() }}
            </div>
        </div>
        
        <!-- Call to Action -->
        <div class="bg-gray-50 py-16">
            <div class="container mx-auto px-4 sm:px-6 lg:px-8">
                <div class="max-w-3xl mx-auto text-center">
                    <h2 class="text-3xl font-bold text-gray-900 mb-4">Vous avez un projet à financer ?</h2>
                    <p class="text-lg text-gray-600 mb-8">
                        Lancez votre propre campagne de financement et donnez vie à vos idées grâce à notre communauté.
                    </p>
                    <a href="#" class="inline-block bg-lime-500 hover:bg-lime-600 text-white font-medium px-8 py-3 rounded-lg transition duration-300">
                        Créer un projet
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>


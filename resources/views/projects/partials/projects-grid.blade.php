@forelse ($projects as $project)
                <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden transition duration-300 ease-in-out transform hover:-translate-y-1 hover:shadow-md">
                    <div class="relative">
                        @if ($project->images && count($project->images) > 0)
                            <img src="{{ asset('storage/'. $project->images[0]->image_url) }}" alt="{{ $project->title }}" class="w-full h-48 object-cover">
                        @else
                            <div class="w-full h-48 bg-gray-100 flex items-center justify-center">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-12 h-12 text-gray-300">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 15.75l5.159-5.159a2.25 2.25 0 013.182 0l5.159 5.159m-1.5-1.5l1.409-1.409a2.25 2.25 0 013.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 001.5-1.5V6a1.5 1.5 0 00-1.5-1.5H3.75A1.5 1.5 0 002.25 6v12a1.5 1.5 0 001.5 1.5zm10.5-11.25h.008v.008h-.008V8.25zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z" />
                                </svg>
                            </div>
                        @endif
                        
                        <!-- Badge de statut -->
                        <div class="absolute top-4 right-4">
    @if ($project->is_draft)
        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800">
            Brouillon
        </span>
    @else
        @switch($project->status)
            @case('pending')
                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                    En attente
                </span>
                @break
            @case('approved')
                @if ($project->end_date->isPast())
                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-purple-100 text-purple-800">
                        Terminé
                    </span>
                @else
                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                        Actif
                    </span>
                @endif
                @break
            @case('rejected')
                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-red-100 text-red-800">
                    Rejeté
                </span>
                @break
            @case('completed')
                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-purple-100 text-purple-800">
                    Terminé
                </span>
                @break
            @default
                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-gray-100 text-gray-800">
                    Inconnu
                </span>
        @endswitch
    @endif
</div>
                        
                        <!-- Badge de catégorie -->
                        <div class="absolute bottom-4 left-4">
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-lime-100 text-lime-800">
                                {{ $project->category->name }}
                            </span>
                        </div>
                    </div>
                    
                    <div class="p-6">
                        <h2 class="text-xl font-bold text-gray-900 mb-2 line-clamp-1">{{ $project->title }}</h2>
                        <p class="text-gray-600 mb-4 text-sm line-clamp-2">{{ $project->description }}</p>
                        
                        <!-- Barre de progression -->
                        <div class="mb-4">
                            @php
                                $percentage = min(100, round(($project->current_amount / $project->goal_amount) * 100));
                            @endphp
                            <div class="flex items-center justify-between text-sm mb-1">
                                <span class="font-medium">{{ $percentage }}% financé</span>
                                <span class="text-gray-500">
                                    @if ($project->end_date->isPast())
                                        <span class="text-red-500">Terminé</span>
                                    @else
                                        {{ $project->daysLeft()}} jours restants
                                    @endif
                                </span>
                            </div>
                            <div class="w-full bg-gray-100 rounded-full h-2">
                                <div class="bg-lime-500 h-2 rounded-full" style="width: {{ $percentage }}%"></div>
                            </div>
                        </div>
                        
                        <!-- Montants -->
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
                        
                        <!-- Actions -->
                        <div class="flex space-x-2">
                            <a href="{{ route('projects.show', $project) }}" class="flex-1 inline-flex justify-center items-center px-4 py-2 border border-gray-300 shadow-sm text-sm font-medium rounded-lg text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-lime-500">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 mr-2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                                Voir
                            </a>
                            <a href="{{ route('projects.edit', $project) }}" class="flex-1 inline-flex justify-center items-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-lg text-fg bg-lime-300 hover:bg-lime-400 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-lime-500">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 mr-2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                </svg>
                                Éditer
                            </a>
                        </div>
                    </div>
                </div>
            @empty
                <!-- État vide -->
                <div class="col-span-1 md:col-span-2 lg:col-span-3 bg-white rounded-xl shadow-sm p-12 text-center border border-gray-100">
                    <div class="inline-flex items-center justify-center w-16 h-16 rounded-full bg-lime-100 mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8 text-lime-500">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126zM12 15.75h.007v.008H12v-.008z" />
                        </svg>
                    </div>
                    <h3 class="text-lg font-medium text-gray-900 mb-2">Aucun projet trouvé</h3>
                    <p class="text-gray-500 mb-6">Vous n'avez pas encore créé de projet.</p>
                    <a href="{{ route('projects.create') }}" class="inline-flex items-center px-4 py-2 bg-lime-300 hover:bg-lime-400 text-fg font-medium rounded-full transition-colors shadow-sm">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 mr-2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                        </svg>
                        Créer votre premier projet
                    </a>
                </div>
            @endforelse
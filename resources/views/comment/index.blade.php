<x-app-layout>
    <x-dashboard-sidebar>
<div class="py-8">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- En-tête -->
        <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-6">
            <div>
                <h1 class="text-2xl font-bold text-gray-900">Mes commentaires</h1>
                <p class="mt-1 text-sm text-gray-500">Gérez vos commentaires sur les projets</p>
            </div>
            <div class="mt-4 md:mt-0">
                <a href="{{ route('projects.index') }}" class="inline-flex items-center px-4 py-2 bg-lime-500 hover:bg-lime-600 text-white font-medium rounded-full transition-colors shadow-sm">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 mr-2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                    </svg>
                    Découvrir des projets
                </a>
            </div>
        </div>

        <!-- Statistiques des commentaires -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
            <!-- Total des commentaires -->
            <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100">
                <div class="flex items-center">
                    <div class="bg-lime-100 p-3 rounded-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-lime-600">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M7.5 8.25h9m-9 3H12m-9.75 1.51c0 1.6 1.123 2.994 2.707 3.227 1.129.166 2.27.293 3.423.379.35.026.67.21.865.501L12 21l2.755-4.133a1.14 1.14 0 01.865-.501 48.172 48.172 0 003.423-.379c1.584-.233 2.707-1.626 2.707-3.228V6.741c0-1.602-1.123-2.995-2.707-3.228A48.394 48.394 0 0012 3c-2.392 0-4.744.175-7.043.513C3.373 3.746 2.25 5.14 2.25 6.741v6.018z" />
                        </svg>
                    </div>
                    <div class="ml-4">
                        <h2 class="text-sm font-medium text-gray-500">Total des commentaires</h2>
                        <p class="text-2xl font-bold text-gray-900">{{ $totalComments ?? 0 }}</p>
                    </div>
                </div>
            </div>

            <!-- Projets commentés -->
            <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100">
                <div class="flex items-center">
                    <div class="bg-lime-100 p-3 rounded-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-lime-600">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6A2.25 2.25 0 016 3.75h2.25A2.25 2.25 0 0110.5 6v2.25a2.25 2.25 0 01-2.25 2.25H6a2.25 2.25 0 01-2.25-2.25V6zM3.75 15.75A2.25 2.25 0 016 13.5h2.25a2.25 2.25 0 012.25 2.25V18a2.25 2.25 0 01-2.25 2.25H6A2.25 2.25 0 013.75 18v-2.25zM13.5 6a2.25 2.25 0 012.25-2.25H18A2.25 2.25 0 0120.25 6v2.25A2.25 2.25 0 0118 10.5h-2.25a2.25 2.25 0 01-2.25-2.25V6zM13.5 15.75a2.25 2.25 0 012.25-2.25H18a2.25 2.25 0 012.25 2.25V18A2.25 2.25 0 0118 20.25h-2.25A2.25 2.25 0 0113.5 18v-2.25z" />
                        </svg>
                    </div>
                    <div class="ml-4">
                        <h2 class="text-sm font-medium text-gray-500">Projets commentés</h2>
                        <p class="text-2xl font-bold text-gray-900">{{ $commentedProjects ?? 0 }}</p>
                    </div>
                </div>
            </div>

            <!-- Réponses reçues -->
            <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100">
                <div class="flex items-center">
                    <div class="bg-lime-100 p-3 rounded-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-lime-600">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M20.25 8.511c.884.284 1.5 1.128 1.5 2.097v4.286c0 1.136-.847 2.1-1.98 2.193-.34.027-.68.052-1.02.072v3.091l-3-3c-1.354 0-2.694-.055-4.02-.163a2.115 2.115 0 01-.825-.242m9.345-8.334a2.126 2.126 0 00-.476-.095 48.64 48.64 0 00-8.048 0c-1.131.094-1.976 1.057-1.976 2.192v4.286c0 .837.46 1.58 1.155 1.951m9.345-8.334V6.637c0-1.621-1.152-3.026-2.76-3.235A48.455 48.455 0 0011.25 3c-2.115 0-4.198.137-6.24.402-1.608.209-2.76 1.614-2.76 3.235v6.226c0 1.621 1.152 3.026 2.76 3.235.577.075 1.157.14 1.74.194V21l4.155-4.155" />
                        </svg>
                    </div>
                    <div class="ml-4">
                        <h2 class="text-sm font-medium text-gray-500">Réponses reçues</h2>
                        <p class="text-2xl font-bold text-gray-900">{{ $receivedReplies ?? 0 }}</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Filtres et recherche -->
        <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100 mb-8">
            <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
                <div class="flex-1">
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 text-gray-400">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                            </svg>
                        </div>
                        <input type="text" id="search" placeholder="Rechercher un commentaire..." class="block w-full pl-10 pr-3 py-2 border border-gray-200 rounded-lg focus:ring-lime-500 focus:border-lime-500">
                    </div>
                </div>
                <div class="flex flex-wrap gap-2">
                    <select id="project-filter" class="border border-gray-200 rounded-lg px-3 py-2 focus:ring-lime-500 focus:border-lime-500">
                        <option value="">Tous les projets</option>
                        @foreach($projects ?? [] as $project)
                            <option value="{{ $project->id }}">{{ $project->title }}</option>
                        @endforeach
                    </select>
                    <select id="date-filter" class="border border-gray-200 rounded-lg px-3 py-2 focus:ring-lime-500 focus:border-lime-500">
                        <option value="">Toutes les dates</option>
                        <option value="this-week">Cette semaine</option>
                        <option value="this-month">Ce mois-ci</option>
                        <option value="last-month">Le mois dernier</option>
                        <option value="this-year">Cette année</option>
                    </select>
                    <select id="sort-by" class="border border-gray-200 rounded-lg px-3 py-2 focus:ring-lime-500 focus:border-lime-500">
                        <option value="newest">Plus récents</option>
                        <option value="oldest">Plus anciens</option>
                        <option value="most-liked">Plus aimés</option>
                        <option value="most-replied">Plus de réponses</option>
                    </select>
                </div>
            </div>
        </div>

        <!-- Liste des commentaires -->
        <div class="space-y-6 mb-8">
            @if(count($comments ?? []) > 0)
                @foreach($comments as $comment)
                    <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
                        <div class="p-6">
                            <div class="flex items-center justify-between mb-4">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0 h-10 w-10">
                                        @if($comment->project->images && count($comment->project->images) > 0)
                                            <img class="h-10 w-10 rounded-lg object-cover" src="{{ $comment->project->images[0]->image_url }}" alt="{{ $comment->project->title }}">
                                        @else
                                            <div class="h-10 w-10 rounded-lg bg-gray-200 flex items-center justify-center">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-gray-400">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 15.75l5.159-5.159a2.25 2.25 0 013.182 0l5.159 5.159m-1.5-1.5l1.409-1.409a2.25 2.25 0 013.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 001.5-1.5V6a1.5 1.5 0 00-1.5-1.5H3.75A1.5 1.5 0 002.25 6v12a1.5 1.5 0 001.5 1.5zm10.5-11.25h.008v.008h-.008V8.25zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z" />
                                                </svg>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="ml-4">
                                        <a href="{{ route('projects.show', $comment->project) }}" class="text-sm font-medium text-gray-900 hover:text-lime-600">{{ $comment->project->title }}</a>
                                        <div class="text-xs text-gray-500">{{ $comment->created_at->format('d/m/Y à H:i') }}</div>
                                    </div>
                                </div>
                                <div class="flex space-x-2">
                                    <button type="button" class="edit-comment-btn text-gray-500 hover:text-lime-600" data-comment-id="{{ $comment->id }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                        </svg>
                                    </button>
                                    <form action="{{ route('comments.destroy', $comment) }}" method="POST" class="inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-gray-500 hover:text-red-600" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce commentaire ?')">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                            </svg>
                                        </button>
                                    </form>
                                </div>
                            </div>
                            
                            <!-- Contenu du commentaire -->
                            <div class="comment-content-{{ $comment->id }} mb-4">
                                <p class="text-gray-700">{{ $comment->content }}</p>
                            </div>
                            
                            <!-- Formulaire d'édition (caché par défaut) -->
                            <div class="edit-form-{{ $comment->id }} hidden mb-4">
                                <form action="{{ route('comments.update', $comment) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <textarea name="content" rows="3" class="w-full border-gray-200 rounded-lg shadow-sm focus:border-lime-500 focus:ring-lime-500 mb-2">{{ $comment->content }}</textarea>
                                    <div class="flex justify-end space-x-2">
                                        <button type="button" class="cancel-edit-btn px-3 py-1.5 border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50" data-comment-id="{{ $comment->id }}">Annuler</button>
                                        <button type="submit" class="px-3 py-1.5 bg-lime-500 text-white rounded-lg hover:bg-lime-600">Enregistrer</button>
                                    </div>
                                </form>
                            </div>
                            
                            <!-- Interactions -->
                            <div class="flex items-center text-sm text-gray-500 space-x-4">
                                <div class="flex items-center">
                                    <button class="flex items-center text-gray-500 hover:text-lime-600">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 mr-1">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M6.633 10.5c.806 0 1.533-.446 2.031-1.08a9.041 9.041 0 012.861-2.4c.723-.384 1.35-.956 1.653-1.715a4.498 4.498 0 00.322-1.672V3a.75.75 0 01.75-.75A2.25 2.25 0 0116.5 4.5c0 1.152-.26 2.243-.723 3.218-.266.558.107 1.282.725 1.282h3.126c1.026 0 1.945.694 2.054 1.715.045.422.068.85.068 1.285a11.95 11.95 0 01-2.649 7.521c-.388.482-.987.729-1.605.729H13.48c-.483 0-.964-.078-1.423-.23l-3.114-1.04a4.501 4.501 0 00-1.423-.23H5.904M14.25 9h2.25M5.904 18.75c.083.205.173.405.27.602.197.4-.078.898-.523.898h-.908c-.889 0-1.713-.518-1.972-1.368a12 12 0 01-.521-3.507c0-1.553.295-3.036.831-4.398C3.387 10.203 4.167 9.75 5 9.75h1.053c.472 0 .745.556.5.96a8.958 8.958 0 00-1.302 4.665c0 1.194.232 2.333.654 3.375z" />
                                        </svg>
                                        {{ $comment->likes_count ?? 0 }}
                                    </button>
                                </div>
                                <div class="flex items-center">
                                    <button class="flex items-center text-gray-500 hover:text-lime-600">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 mr-1">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M7.5 8.25h9m-9 3H12m-9.75 1.51c0 1.6 1.123 2.994 2.707 3.227 1.129.166 2.27.293 3.423.379.35.026.67.21.865.501L12 21l2.755-4.133a1.14 1.14 0 01.865-.501 48.172 48.172 0 003.423-.379c1.584-.233 2.707-1.626 2.707-3.228V6.741c0-1.602-1.123-2.995-2.707-3.228A48.394 48.394 0 0012 3c-2.392 0-4.744.175-7.043.513C3.373 3.746 2.25 5.14 2.25 6.741v6.018z" />
                                        </svg>
                                        {{ $comment->replies_count ?? 0 }} réponses
                                    </button>
                                </div>
                            </div>
                            
                            <!-- Réponses (si présentes) -->
                            @if(isset($comment->replies) && count($comment->replies) > 0)
                                <div class="mt-4 pl-4 border-l-2 border-gray-100 space-y-4">
                                    @foreach($comment->replies as $reply)
                                        <div class="bg-gray-50 rounded-lg p-4">
                                            <div class="flex items-center mb-2">
                                                <img src="{{ $reply->user->avatar }}" alt="{{ $reply->user->name }}" class="w-8 h-8 rounded-full mr-2">
                                                <div>
                                                    <p class="text-sm font-medium text-gray-900">{{ $reply->user->name }}</p>
                                                    <p class="text-xs text-gray-500">{{ $reply->created_at->format('d/m/Y à H:i') }}</p>
                                                </div>
                                            </div>
                                            <p class="text-sm text-gray-700">{{ $reply->content }}</p>
                                        </div>
                                    @endforeach
                                </div>
                            @endif
                        </div>
                    </div>
                @endforeach
                
                <!-- Pagination -->
                <div class="mt-6">
                    {{ $comments->links() }}
                </div>
            @else
                <div class="bg-white rounded-xl shadow-sm p-12 text-center border border-gray-100">
                    <div class="inline-flex items-center justify-center w-16 h-16 rounded-full bg-lime-100 mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8 text-lime-500">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M7.5 8.25h9m-9 3H12m-9.75 1.51c0 1.6 1.123 2.994 2.707 3.227 1.129.166 2.27.293 3.423.379.35.026.67.21.865.501L12 21l2.755-4.133a1.14 1.14 0 01.865-.501 48.172 48.172 0 003.423-.379c1.584-.233 2.707-1.626 2.707-3.228V6.741c0-1.602-1.123-2.995-2.707-3.228A48.394 48.394 0 0012 3c-2.392 0-4.744.175-7.043.513C3.373 3.746 2.25 5.14 2.25 6.741v6.018z" />
                        </svg>
                    </div>
                    <h3 class="text-lg font-medium text-gray-900 mb-2">Aucun commentaire trouvé</h3>
                    <p class="text-gray-500 mb-6">Vous n'avez pas encore commenté de projet.</p>
                    <a href="{{ route('projects.index') }}" class="inline-flex items-center px-4 py-2 bg-lime-500 hover:bg-lime-600 text-white font-medium rounded-full transition-colors shadow-sm">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 mr-2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                        </svg>
                        Découvrir des projets
                    </a>
                </div>
            @endif
        </div>

        <!-- Projets populaires -->
        <div class="mt-12">
            <h2 class="text-xl font-bold text-gray-900 mb-6">Projets populaires à commenter</h2>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                @foreach($popularProjects ?? [] as $project)
                    <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden transition duration-300 ease-in-out transform hover:-translate-y-1 hover:shadow-md">
                        <div class="relative">
                            @if($project->images && count($project->images) > 0)
                                <img src="{{ $project->images[0]->image_url }}" alt="{{ $project->title }}" class="w-full h-48 object-cover">
                            @else
                                <div class="w-full h-48 bg-gray-100 flex items-center justify-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-12 h-12 text-gray-300">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 15.75l5.159-5.159a2.25 2.25 0 013.182 0l5.159 5.159m-1.5-1.5l1.409-1.409a2.25 2.25 0 013.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 001.5-1.5V6a1.5 1.5 0 00-1.5-1.5H3.75A1.5 1.5 0 002.25 6v12a1.5 1.5 0 001.5 1.5zm10.5-11.25h.008v.008h-.008V8.25zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z" />
                                    </svg>
                                </div>
                            @endif
                            
                            <!-- Badge de commentaires -->
                            <div class="absolute top-4 right-4 bg-white rounded-full px-3 py-1 text-xs font-medium shadow-sm">
                                <div class="flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 mr-1 text-lime-500">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M7.5 8.25h9m-9 3H12m-9.75 1.51c0 1.6 1.123 2.994 2.707 3.227 1.129.166 2.27.293 3.423.379.35.026.67.21.865.501L12 21l2.755-4.133a1.14 1.14 0 01.865-.501 48.172 48.172 0 003.423-.379c1.584-.233 2.707-1.626 2.707-3.228V6.741c0-1.602-1.123-2.995-2.707-3.228A48.394 48.394 0 0012 3c-2.392 0-4.744.175-7.043.513C3.373 3.746 2.25 5.14 2.25 6.741v6.018z" />
                                    </svg>
                                    {{ $project->comments_count ?? 0 }}
                                </div>
                            </div>
                        </div>
                        
                        <div class="p-6">
                            <h3 class="text-lg font-bold text-gray-900 mb-2 line-clamp-1">{{ $project->title }}</h3>
                            <p class="text-gray-600 mb-4 text-sm line-clamp-2">{{ $project->description }}</p>
                            
                            <!-- Barre de progression -->
                            <div class="mb-4">
                                @php
                                    $percentage = min(100, round(($project->current_amount / $project->goal_amount) * 100));
                                @endphp
                                <div class="w-full bg-gray-100 rounded-full h-2 mb-2">
                                    <div class="bg-lime-500 h-2 rounded-full" style="width: {{ $percentage }}%"></div>
                                </div>
                                <div class="flex justify-between text-sm">
                                    <span class="font-medium">{{ $percentage }}% financé</span>
                                    <span class="text-gray-500">
                                        @if($project->end_date->isPast())
                                            <span class="text-red-500">Terminé</span>
                                        @else
                                            {{ $project->end_date->diffInDays(now()) }} jours restants
                                        @endif
                                    </span>
                                </div>
                            </div>
                            
                            <a href="{{ route('projects.show', $project) }}" class="block w-full bg-lime-500 hover:bg-lime-600 text-white text-center py-2 rounded-lg transition duration-300 font-medium">
                                Voir et commenter
                            </a>
                        </div>
                    </div>
                @endforeach
                
                @if(count($popularProjects ?? []) === 0)
                    <div class="col-span-1 md:col-span-3 bg-gray-50 rounded-xl p-8 text-center">
                        <p class="text-gray-600">Aucun projet populaire disponible pour le moment.</p>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Filtres
        const searchInput = document.getElementById('search');
        const projectFilter = document.getElementById('project-filter');
        const dateFilter = document.getElementById('date-filter');
        const sortBy = document.getElementById('sort-by');
        
        // Fonction pour appliquer les filtres
        function applyFilters() {
            // Ici, vous pourriez implémenter une logique AJAX pour filtrer les résultats
            // sans recharger la page, ou rediriger vers une URL avec les paramètres de filtre
            
            const searchValue = searchInput.value;
            const projectValue = projectFilter.value;
            const dateValue = dateFilter.value;
            const sortValue = sortBy.value;
            
            console.log('Filtres appliqués:', {
                search: searchValue,
                project: projectValue,
                date: dateValue,
                sort: sortValue
            });
            
            // Exemple de redirection avec paramètres
            // window.location.href = `{{ route('comments.index') }}?search=${searchValue}&project=${projectValue}&date=${dateValue}&sort=${sortValue}`;
        }
        
        // Ajouter des écouteurs d'événements
        searchInput.addEventListener('input', applyFilters);
        projectFilter.addEventListener('change', applyFilters);
        dateFilter.addEventListener('change', applyFilters);
        sortBy.addEventListener('change', applyFilters);
        
        // Gestion de l'édition des commentaires
        const editButtons = document.querySelectorAll('.edit-comment-btn');
        const cancelButtons = document.querySelectorAll('.cancel-edit-btn');
        
        editButtons.forEach(button => {
            button.addEventListener('click', function() {
                const commentId = this.getAttribute('data-comment-id');
                document.querySelector(`.comment-content-${commentId}`).classList.add('hidden');
                document.querySelector(`.edit-form-${commentId}`).classList.remove('hidden');
            });
        });
        
        cancelButtons.forEach(button => {
            button.addEventListener('click', function() {
                const commentId = this.getAttribute('data-comment-id');
                document.querySelector(`.comment-content-${commentId}`).classList.remove('hidden');
                document.querySelector(`.edit-form-${commentId}`).classList.add('hidden');
            });
        });
    });
</script>
</x-dashboard-sidebar>
</x-app-layout>


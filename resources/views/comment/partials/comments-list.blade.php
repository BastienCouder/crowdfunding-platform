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
                                        <button type="submit" class="px-3 py-1.5 bg-lime-300 text-fg rounded-lg hover:bg-lime-400">Enregistrer</button>
                                    </div>
                                </form>
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
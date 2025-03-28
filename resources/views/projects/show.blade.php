<x-app-layout>
    @include('layouts.navigation')
<div class="bg-white min-h-screen">
    <!-- Hero Image Section -->
    <div class="relative">
        @if ($project->images && count($project->images) > 0)
            <div class="h-96 w-full overflow-hidden">
                <img src="{{ $project->images[0]->image_url }}" alt="{{ $project->title }}" class="w-full h-full object-cover">
            </div>
        @else
            <div class="h-96 w-full bg-gray-100 flex items-center justify-center">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-16 h-16 text-gray-300">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 15.75l5.159-5.159a2.25 2.25 0 013.182 0l5.159 5.159m-1.5-1.5l1.409-1.409a2.25 2.25 0 013.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 001.5-1.5V6a1.5 1.5 0 00-1.5-1.5H3.75A1.5 1.5 0 002.25 6v12a1.5 1.5 0 001.5 1.5zm10.5-11.25h.008v.008h-.008V8.25zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z" />
                </svg>
            </div>
        @endif
        
        <!-- Overlay with category badge -->
        <div class="absolute top-0 left-0 w-full h-full bg-gradient-to-t from-black/60 to-transparent"></div>
        <div class="absolute bottom-0 left-0 w-full p-8">
            <div class="container mx-auto max-w-6xl">
                <span class="inline-block bg-lime-500 text-white px-4 py-1 rounded-full text-sm font-medium shadow-md mb-4">
                    {{ $project->category->name }}
                </span>
                <h1 class="text-4xl md:text-5xl font-bold text-white mb-2">{{ $project->title }}</h1>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="container mx-auto max-w-6xl px-4 py-12">
        <div class="flex flex-col lg:flex-row gap-12">
            <!-- Left Column: Project Details -->
            <div class="flex-1">
                <!-- Project Creator -->
                <div class="flex items-center mb-8 p-6 bg-gray-50 rounded-xl">
                    <img src="{{ $project->user->avatar }}" alt="{{ $project->user->name }}" class="w-16 h-16 rounded-full border-2 border-lime-200">
                    <div class="ml-4">
                        <p class="text-sm text-gray-500">Porteur de projet</p>
                        <p class="text-xl font-semibold text-gray-900">{{ $project->user->name }}</p>
                    </div>
                    
                    @if(auth()->id() === $project->user_id)
                        <div class="ml-auto flex space-x-2">
                            <a href="{{ route('projects.edit', $project) }}" class="inline-flex items-center px-3 py-1.5 bg-lime-500 text-white rounded-lg hover:bg-lime-600 transition-colors text-sm">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 mr-1">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                </svg>
                                Modifier
                            </a>
                        </div>
                    @endif
                </div>
                
                <!-- Project Summary -->
                @if(isset($project->summary) && !empty($project->summary))
                <div class="mb-8 p-6 bg-lime-50 rounded-xl border border-lime-100">
                    <h2 class="text-xl font-bold text-gray-900 mb-3">Résumé du projet</h2>
                    <p class="text-gray-700">{{ $project->summary }}</p>
                </div>
                @endif
                
                <!-- Project Description -->
                <div class="mb-12">
                    <h2 class="text-2xl font-bold text-gray-900 mb-6 flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-lime-500 mr-2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M11.25 11.25l.041-.02a.75.75 0 011.063.852l-.708 2.836a.75.75 0 001.063.853l.041-.021M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9-3.75h.008v.008H12V8.25z" />
                        </svg>
                        À propos de ce projet
                    </h2>
                    <div class="prose prose-lg max-w-none">
                        <p class="text-gray-700 leading-relaxed">{{ $project->description }}</p>
                    </div>
                </div>
                
                <!-- Video (if available) -->
                @if(isset($project->video_url) && !empty($project->video_url))
                <div class="mb-12">
                    <h2 class="text-2xl font-bold text-gray-900 mb-6 flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-lime-500 mr-2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.91 11.672a.375.375 0 010 .656l-5.603 3.113a.375.375 0 01-.557-.328V8.887c0-.286.307-.466.557-.327l5.603 3.112z" />
                        </svg>
                        Vidéo de présentation
                    </h2>
                    <div class="aspect-w-16 aspect-h-9 rounded-xl overflow-hidden">
                        @php
                            // Extract video ID from YouTube or Vimeo URL
                            $videoId = null;
                            $videoType = null;
                            
                            if (strpos($project->video_url, 'youtube.com') !== false || strpos($project->video_url, 'youtu.be') !== false) {
                                $videoType = 'youtube';
                                if (preg_match('/(?:youtube\.com\/(?:[^\/]+\/.+\/|(?:v|e(?:mbed)?)\/|.*[?&]v=)|youtu\.be\/)([^"&?\/\s]{11})/', $project->video_url, $match)) {
                                    $videoId = $match[1];
                                }
                            } elseif (strpos($project->video_url, 'vimeo.com') !== false) {
                                $videoType = 'vimeo';
                                if (preg_match('/vimeo\.com\/(?:channels\/(?:\w+\/)?|groups\/(?:[^\/]*)\/videos\/|album\/(?:\d+)\/video\/|)(\d+)(?:$|\/|\?)/', $project->video_url, $match)) {
                                    $videoId = $match[1];
                                }
                            }
                        @endphp
                        
                        @if($videoType === 'youtube' && $videoId)
                            <iframe class="w-full h-96 rounded-xl" src="https://www.youtube.com/embed/{{ $videoId }}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        @elseif($videoType === 'vimeo' && $videoId)
                            <iframe class="w-full h-96 rounded-xl" src="https://player.vimeo.com/video/{{ $videoId }}" frameborder="0" allow="autoplay; fullscreen; picture-in-picture" allowfullscreen></iframe>
                        @else
                            <div class="bg-gray-100 w-full h-96 flex items-center justify-center rounded-xl">
                                <p class="text-gray-500">La vidéo n'a pas pu être chargée</p>
                            </div>
                        @endif
                    </div>
                </div>
                @endif
                
                <!-- Project Gallery -->
                <div class="mb-12">
                    <h2 class="text-2xl font-bold text-gray-900 mb-6 flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-lime-500 mr-2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 15.75l5.159-5.159a2.25 2.25 0 013.182 0l5.159 5.159m-1.5-1.5l1.409-1.409a2.25 2.25 0 013.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 001.5-1.5V6a1.5 1.5 0 00-1.5-1.5H3.75A1.5 1.5 0 002.25 6v12a1.5 1.5 0 001.5 1.5zm10.5-11.25h.008v.008h-.008V8.25zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z" />
                        </svg>
                        Galerie du projet
                    </h2>
                    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">
                        @foreach($project->images as $image)
                            <div class="rounded-xl overflow-hidden shadow-sm hover:shadow-md transition-shadow">
                                <img src="{{ $image->image_url }}" alt="Image du projet {{ $project->title }}" class="w-full h-48 object-cover">
                            </div>
                        @endforeach
                    </div>
                </div>
    <!-- Funding Tiers -->
@if(!empty($project->funding_tiers) && count($project->funding_tiers) > 0)
<div class="mb-12">
    <h2 class="text-2xl font-bold text-gray-900 mb-6 flex items-center">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-lime-500 mr-2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M3 13.125C3 12.504 3.504 12 4.125 12h2.25c.621 0 1.125.504 1.125 1.125v6.75C7.5 20.496 6.996 21 6.375 21h-2.25A1.125 1.125 0 013 19.875v-6.75zM9.75 8.625c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125v11.25c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 01-1.125-1.125V8.625zM16.5 4.125c0-.621.504-1.125 1.125-1.125h2.25C20.496 3 21 3.504 21 4.125v15.75c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 01-1.125-1.125V4.125z" />
        </svg>
        Paliers de financement
    </h2>
    <div class="space-y-4">
        @foreach($project->funding_tiers as $tier)
            <div class="bg-white border border-gray-100 rounded-xl p-6 shadow-sm hover:shadow-md transition-shadow">
                <div class="flex justify-between items-center mb-3">
                    <h3 class="text-lg font-bold text-gray-900">{{ isset($tier->title) && !empty($tier->title) ? $tier->title : 'Sans titre' }}</h3>
                    <span class="text-lime-600 font-bold">{{ number_format($tier->amount, 0, ',', ' ') }} €</span>
                </div>
                <p class="text-gray-700">{{ isset($tier->reward) && !empty($tier->reward) ? $tier->reward : 'Sans récompense' }}</p>
                
                @php
                    $tierPercentage = min(100, round(($project->current_amount / $tier->amount) * 100));
                @endphp
                
                <div class="mt-4">
                    <div class="w-full bg-gray-100 rounded-full h-2 mb-2">
                        <div class="bg-lime-500 h-2 rounded-full" style="width: {{ $tierPercentage }}%"></div>
                    </div>
                    <div class="flex justify-between text-sm">
                        <span class="font-medium">{{ $tierPercentage }}% atteint</span>
                        @if($project->current_amount >= $tier->amount)
                            <span class="text-lime-600 font-medium">Palier atteint !</span>
                        @else
                            <span class="text-gray-500">{{ number_format($tier->amount - $project->current_amount, 0, ',', ' ') }} € restants</span>
                        @endif
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endif
                
                <!-- Risks and Challenges -->
                @if(isset($project->risks) && !empty($project->risks))
                <div class="mb-12">
                    <h2 class="text-2xl font-bold text-gray-900 mb-6 flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-lime-500 mr-2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126zM12 15.75h.007v.008H12v-.008z" />
                        </svg>
                        Risques et défis
                    </h2>
                    <div class="bg-white border border-gray-100 rounded-xl p-6 shadow-sm">
                        <p class="text-gray-700 leading-relaxed">{{ $project->risks }}</p>
                    </div>
                </div>
                @endif
                
                <!-- FAQ -->
                @if(isset($project->faqs) && count($project->faqs) > 0)
                <div class="mb-12">
                    <h2 class="text-2xl font-bold text-gray-900 mb-6 flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-lime-500 mr-2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9.879 7.519c1.171-1.025 3.071-1.025 4.242 0 1.172 1.025 1.172 2.687 0 3.712-.203.179-.43.326-.67.442-.745.361-1.45.999-1.45 1.827v.75M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9 5.25h.008v.008H12v-.008z" />
                        </svg>
                        Questions fréquentes
                    </h2>
                    <div class="space-y-4">
                        @foreach($project->faqs as $faq)
                            <div class="faq-item bg-white border border-gray-100 rounded-xl overflow-hidden shadow-sm">
                                <div class="faq-header p-5 cursor-pointer flex justify-between items-center">
                                    <h3 class="font-medium text-gray-900">{{ $faq['question'] }}</h3>
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 text-gray-500 faq-icon">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                                    </svg>
                                </div>
                                <div class="faq-content max-h-0 overflow-hidden transition-all duration-300 px-5">
                                    <div class="py-4 border-t border-gray-100">
                                        <p class="text-gray-700">{{ $faq['answer'] }}</p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                @endif
                
                <!-- Recent Contributions -->
                <div class="mb-12">
                    <h2 class="text-2xl font-bold text-gray-900 mb-6 flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-lime-500 mr-2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M21 11.25v8.25a1.5 1.5 0 01-1.5 1.5H5.25a1.5 1.5 0 01-1.5-1.5v-8.25M12 4.875A2.625 2.625 0 109.375 7.5H12m0-2.625V7.5m0-2.625A2.625 2.625 0 1114.625 7.5H12m0 0V21m-8.625-9.75h18c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125h-18c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125z" />
                        </svg>
                        Contributions récentes ({{ $project->contributions->count() }})
                    </h2>
                    
                    @if(count($project->contributions) > 0)
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            @foreach ($project->contributions as $index => $contribution)
                                <div class="bg-white border border-gray-100 rounded-xl p-5 shadow-sm hover:shadow-md transition-shadow @if($index >= 6) hidden extra-contribution @endif">
                                    <div class="flex items-center">
                                        <img src="{{ $contribution->user->avatar }}" alt="{{ $contribution->user->name }}" class="w-12 h-12 rounded-full mr-4 border border-lime-200">
                                        <div>
                                            <p class="font-semibold text-gray-900">{{ $contribution->user->name }}</p>
                                            <p class="text-sm text-gray-500">{{ $contribution->created_at->diffForHumans() }}</p>
                                        </div>
                                        <div class="ml-auto">
                                            <span class="text-lime-600 font-bold text-lg">{{ $contribution->amount }} €</span>
                                        </div>
                                    </div>
                                    @if($contribution->message)
                                        <div class="mt-3 pt-3 border-t border-gray-100">
                                            <p class="text-gray-700 italic">"{{ $contribution->message }}"</p>
                                        </div>
                                    @endif
                                </div>
                            @endforeach
                        </div>
                        
                        @if(count($project->contributions) > 6)
                            <div class="mt-6 text-center">
                                <button id="showAllContributions" class="inline-flex items-center px-4 py-2 rounded-full border border-lime-500 text-lime-600 hover:bg-lime-50 transition-colors">
                                    <span id="contributionButtonText">Voir toutes les contributions</span>
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 ml-2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                                    </svg>
                                </button>
                            </div>
                        @endif
                    @else
                        <div class="bg-gray-50 rounded-xl p-8 text-center">
                            <div class="inline-flex items-center justify-center w-16 h-16 rounded-full bg-lime-100 mb-4">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8 text-lime-500">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M21 11.25v8.25a1.5 1.5 0 01-1.5 1.5H5.25a1.5 1.5 0 01-1.5-1.5v-8.25M12 4.875A2.625 2.625 0 109.375 7.5H12m0-2.625V7.5m0-2.625A2.625 2.625 0 1114.625 7.5H12m0 0V21m-8.625-9.75h18c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125h-18c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125z" />
                                </svg>
                            </div>
                            <p class="text-gray-600 mb-2">Aucune contribution pour le moment</p>
                            <p class="text-gray-500 text-sm">Soyez le premier à soutenir ce projet !</p>
                        </div>
                    @endif
                </div>

               <!-- Comments Section -->
<div>
    <h2 class="text-2xl font-bold text-gray-900 mb-6 flex items-center">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-lime-500 mr-2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M7.5 8.25h9m-9 3H12m-9.75 1.51c0 1.6 1.123 2.994 2.707 3.227 1.129.166 2.27.293 3.423.379.35.026.67.21.865.501L12 21l2.755-4.133a1.14 1.14 0 01.865-.501 48.172 48.172 0 003.423-.379c1.584-.233 2.707-1.626 2.707-3.228V6.741c0-1.602-1.123-2.995-2.707-3.228A48.394 48.394 0 0012 3c-2.392 0-4.744.175-7.043.513C3.373 3.746 2.25 5.14 2.25 6.741v6.018z" />
        </svg>
        Commentaires ({{ count($project->comments) }})
    </h2>
                    
                    <!-- Comment Form -->
                    <div class="bg-gray-50 rounded-xl p-6 mb-8">
                        <h3 class="text-lg font-semibold text-gray-900 mb-4">Laisser un commentaire</h3>
                        <form action="{{ route('comments.store', $project) }}" method="POST">
                            @csrf
                            <div class="mb-4">
                                <textarea name="content" rows="4" class="w-full border-gray-200 rounded-xl shadow-sm focus:border-lime-500 focus:ring-lime-500" placeholder="Partagez vos pensées sur ce projet..." required></textarea>
                            </div>
                            <div class="flex justify-end">
                                <button type="submit" class="inline-flex items-center px-6 py-3 bg-lime-500 hover:bg-lime-600 text-white font-medium rounded-xl transition-colors">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 mr-2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M7.5 8.25h9m-9 3H12m-9.75 1.51c0 1.6 1.123 2.994 2.707 3.227 1.129.166 2.27.293 3.423.379.35.026.67.21.865.501L12 21l2.755-4.133a1.14 1.14 0 01.865-.501 48.172 48.172 0 003.423-.379c1.584-.233 2.707-1.626 2.707-3.228V6.741c0-1.602-1.123-2.995-2.707-3.228A48.394 48.394 0 0012 3c-2.392 0-4.744.175-7.043.513C3.373 3.746 2.25 5.14 2.25 6.741v6.018z" />
                                    </svg>
                                    Publier le commentaire
                                </button>
                            </div>
                        </form>
                    </div>
                    
                    <!-- Comments List -->
                    @if(count($project->comments) > 0)
        <div class="space-y-6">
            @foreach ($project->comments->take(5) as $comment)
                                <div class="bg-white border border-gray-100 rounded-xl p-6 shadow-sm">
                                    <div class="flex items-center mb-4">
                                        <img src="{{ $comment->user->avatar }}" alt="{{ $comment->user->name }}" class="w-12 h-12 rounded-full mr-4 border border-lime-200">
                                        <div>
                                            <p class="font-semibold text-gray-900">{{ $comment->user->name }}</p>
                                            <p class="text-sm text-gray-500">{{ $comment->created_at->format('d M Y, H:i') }}</p>
                                        </div>
                                    </div>
                                    <div class="prose prose-sm max-w-none">
                                        <p class="text-gray-700">{{ $comment->content }}</p>
                                    </div>
                                    <div class="mt-4 flex items-center space-x-4">
                                        <button class="text-gray-500 hover:text-lime-600 flex items-center text-sm">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 mr-1">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M6.633 10.5c.806 0 1.533-.446 2.031-1.08a9.041 9.041 0 012.861-2.4c.723-.384 1.35-.956 1.653-1.715a4.498 4.498 0 00.322-1.672V3a.75.75 0 01.75-.75A2.25 2.25 0 0116.5 4.5c0 1.152-.26 2.243-.723 3.218-.266.558.107 1.282.725 1.282h3.126c1.026 0 1.945.694 2.054 1.715.045.422.068.85.068 1.285a11.95 11.95 0 01-2.649 7.521c-.388.482-.987.729-1.605.729H13.48c-.483 0-.964-.078-1.423-.23l-3.114-1.04a4.501 4.501 0 00-1.423-.23H5.904M14.25 9h2.25M5.904 18.75c.083.205.173.405.27.602.197.4-.078.898-.523.898h-.908c-.889 0-1.713-.518-1.972-1.368a12 12 0 01-.521-3.507c0-1.553.295-3.036.831-4.398C3.387 10.203 4.167 9.75 5 9.75h1.053c.472 0 .745.556.5.96a8.958 8.958 0 00-1.302 4.665c0 1.194.232 2.333.654 3.375z" />
                                            </svg>
                                            J'aime
                                        </button>
                                        <button class="text-gray-500 hover:text-lime-600 flex items-center text-sm">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 mr-1">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M7.5 8.25h9m-9 3H12m-9.75 1.51c0 1.6 1.123 2.994 2.707 3.227 1.129.166 2.27.293 3.423.379.35.026.67.21.865.501L12 21l2.755-4.133a1.14 1.14 0 01.865-.501 48.172 48.172 0 003.423-.379c1.584-.233 2.707-1.626 2.707-3.228V6.741c0-1.602-1.123-2.995-2.707-3.228A48.394 48.394 0 0012 3c-2.392 0-4.744.175-7.043.513C3.373 3.746 2.25 5.14 2.25 6.741v6.018z" />
                                            </svg>
                                            Répondre
                                        </button>
                                    </div>
                                </div>
                            @endforeach

                             <!-- Commentaires supplémentaires cachés -->
            @if(count($project->comments) > 5)
                <div class="extra-comments hidden space-y-6">
                    @foreach ($project->comments->slice(5) as $comment)
                    <div class="bg-white border border-gray-100 rounded-xl p-6 shadow-sm">
                                    <div class="flex items-center mb-4">
                                        <img src="{{ $comment->user->avatar }}" alt="{{ $comment->user->name }}" class="w-12 h-12 rounded-full mr-4 border border-lime-200">
                                        <div>
                                            <p class="font-semibold text-gray-900">{{ $comment->user->name }}</p>
                                            <p class="text-sm text-gray-500">{{ $comment->created_at->format('d M Y, H:i') }}</p>
                                        </div>
                                    </div>
                                    <div class="prose prose-sm max-w-none">
                                        <p class="text-gray-700">{{ $comment->content }}</p>
                                    </div>
                                    <div class="mt-4 flex items-center space-x-4">
                                        <button class="text-gray-500 hover:text-lime-600 flex items-center text-sm">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 mr-1">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M6.633 10.5c.806 0 1.533-.446 2.031-1.08a9.041 9.041 0 012.861-2.4c.723-.384 1.35-.956 1.653-1.715a4.498 4.498 0 00.322-1.672V3a.75.75 0 01.75-.75A2.25 2.25 0 0116.5 4.5c0 1.152-.26 2.243-.723 3.218-.266.558.107 1.282.725 1.282h3.126c1.026 0 1.945.694 2.054 1.715.045.422.068.85.068 1.285a11.95 11.95 0 01-2.649 7.521c-.388.482-.987.729-1.605.729H13.48c-.483 0-.964-.078-1.423-.23l-3.114-1.04a4.501 4.501 0 00-1.423-.23H5.904M14.25 9h2.25M5.904 18.75c.083.205.173.405.27.602.197.4-.078.898-.523.898h-.908c-.889 0-1.713-.518-1.972-1.368a12 12 0 01-.521-3.507c0-1.553.295-3.036.831-4.398C3.387 10.203 4.167 9.75 5 9.75h1.053c.472 0 .745.556.5.96a8.958 8.958 0 00-1.302 4.665c0 1.194.232 2.333.654 3.375z" />
                                            </svg>
                                            J'aime
                                        </button>
                                        <button class="text-gray-500 hover:text-lime-600 flex items-center text-sm">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 mr-1">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M7.5 8.25h9m-9 3H12m-9.75 1.51c0 1.6 1.123 2.994 2.707 3.227 1.129.166 2.27.293 3.423.379.35.026.67.21.865.501L12 21l2.755-4.133a1.14 1.14 0 01.865-.501 48.172 48.172 0 003.423-.379c1.584-.233 2.707-1.626 2.707-3.228V6.741c0-1.602-1.123-2.995-2.707-3.228A48.394 48.394 0 0012 3c-2.392 0-4.744.175-7.043.513C3.373 3.746 2.25 5.14 2.25 6.741v6.018z" />
                                            </svg>
                                            Répondre
                                        </button>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                         <!-- Bouton Voir plus -->
                <div class="text-center mt-6">
                    <button id="showMoreComments" class="inline-flex items-center px-4 py-2 rounded-full border border-lime-500 text-lime-600 hover:bg-lime-50 transition-colors">
                        <span id="commentButtonText">Voir plus de commentaires</span>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 ml-2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                        </svg>
                    </button>
                </div>
            @endif
            </div>
                    @else
                        <div class="bg-gray-50 rounded-xl p-8 text-center">
                            <div class="inline-flex items-center justify-center w-16 h-16 rounded-full bg-lime-100 mb-4">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8 text-lime-500">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M7.5 8.25h9m-9 3H12m-9.75 1.51c0 1.6 1.123 2.994 2.707 3.227 1.129.166 2.27.293 3.423.379.35.026.67.21.865.501L12 21l2.755-4.133a1.14 1.14 0 01.865-.501 48.172 48.172 0 003.423-.379c1.584-.233 2.707-1.626 2.707-3.228V6.741c0-1.602-1.123-2.995-2.707-3.228A48.394 48.394 0 0012 3c-2.392 0-4.744.175-7.043.513C3.373 3.746 2.25 5.14 2.25 6.741v6.018z" />
                                </svg>
                            </div>
                            <p class="text-gray-600 mb-2">Aucun commentaire pour le moment</p>
                            <p class="text-gray-500 text-sm">Soyez le premier à commenter ce projet !</p>
                        </div>
                    @endif
                </div>
            </div>
            
            <!-- Right Column: Funding Sidebar -->
            <div class="w-full lg:w-96">
                <div class="bg-white rounded-xl border border-gray-100 shadow-sm p-6 sticky top-8">
                    <!-- Funding Progress -->
                    <div class="mb-6">
                        <div class="flex justify-between items-center mb-2">
                            <span class="text-3xl font-bold text-lime-600">{{ number_format($project->current_amount, 0, ',', ' ') }} €</span>
                            <span class="text-gray-500 font-medium">sur {{ number_format($project->goal_amount, 0, ',', ' ') }} €</span>
                        </div>
                        
                        @php
                            $percentage = min(100, round(($project->current_amount / $project->goal_amount) * 100));
                        @endphp
                        
                        <div class="w-full bg-gray-100 rounded-full h-3 mb-3">
                            <div class="bg-lime-500 h-3 rounded-full" style="width: {{ $percentage }}%"></div>
                        </div>
                        
                        <div class="flex justify-between text-sm">
                            <span class="font-medium">{{ $percentage }}% financé</span>
                            <div class="text-gray-500">
                                @if ($project->end_date->isPast())
                                    <span class="text-red-500 font-medium">Terminé</span>
                                @else
                                    <span class="font-medium">{{ $project->daysLeft() }}</span> jours restants
                                @endif
                            </div>
                        </div>
                    </div>
                    
                    <!-- Contribution Stats -->
                    <div class="flex items-center justify-between mb-6 p-4 bg-gray-50 rounded-xl">
                        <div class="text-center">
                            <span class="block text-2xl font-bold text-gray-900">{{ $project->contributions->count() }}</span>
                            <span class="text-sm text-gray-500">Contributeurs</span>
                        </div>
                        <div class="h-12 w-px bg-gray-200"></div>
                        <div class="text-center">
                            <span class="block text-2xl font-bold text-gray-900">{{ $project->created_at->format('d/m/Y') }}</span>
                            <span class="text-sm text-gray-500">Date de création</span>
                        </div>
                    </div>
                    
                    <!-- Contribution Form -->
                    <form action="{{ route('contributions.store', $project) }}" method="POST" class="space-y-4 mb-6">
                        @csrf
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                <span class="text-gray-500">€</span>
                            </div>
                            <input type="number" name="amount" class="block w-full pl-8 pr-12 py-3 border border-gray-200 rounded-xl focus:ring-lime-500 focus:border-lime-500" placeholder="Montant" required>
                            <div class="absolute inset-y-0 right-0 flex items-center">
                                <label for="currency" class="sr-only">Devise</label>
                                <select id="currency" name="currency" class="h-full py-0 pl-2 pr-7 border-transparent bg-transparent text-gray-500 sm:text-sm rounded-r-xl">
                                    <option>EUR</option>
                                </select>
                            </div>
                        </div>
                        <button type="submit" class="w-full bg-lime-500 hover:bg-lime-600 text-white font-medium py-3 px-4 rounded-xl transition-colors flex items-center justify-center">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 mr-2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z" />
                            </svg>
                            Contribuer maintenant
                        </button>
                    </form>
                    
                    <!-- Social Sharing -->
                    <div class="border-t border-gray-100 pt-6">
                        <h3 class="font-medium text-gray-900 mb-4">Partager ce projet</h3>
                        <div class="flex space-x-3">
                            <a href="#" class="bg-lime-500 text-white p-2 rounded-lg hover:bg-opacity-90 transition-colors">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path fill-rule="evenodd" d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z" clip-rule="evenodd"></path></svg>
                            </a>
                            <a href="#" class="bg-lime-500 text-white p-2 rounded-lg hover:bg-opacity-90 transition-colors">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path d="M8.29 20.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0022 5.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.072 4.072 0 012.8 9.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 012 18.407a11.616 11.616 0 006.29 1.84"></path></svg>
                            </a>

                            <a href="#" class="bg-lime-500 text-white p-2 rounded-lg hover:bg-opacity-90 transition-colors">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M7.217 10.907a2.25 2.25 0 100 2.186m0-2.186c.18.324.283.696.283 1.093s-.103.77-.283 1.093m0-2.186l9.566-5.314m-9.566 7.5l9.566 5.314m0 0a2.25 2.25 0 103.935 2.186 2.25 2.25 0 00-3.935-2.186zm0-12.814a2.25 2.25 0 103.933-2.185 2.25 2.25 0 00-3.933 2.185z" />
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Toggle contributions
        const showAllButton = document.getElementById('showAllContributions');
        
        if (showAllButton) {
            showAllButton.addEventListener('click', function() {
                const extraContributions = document.querySelectorAll('.extra-contribution');
                const buttonText = document.getElementById('contributionButtonText');
                
                extraContributions.forEach(contribution => {
                    contribution.classList.toggle('hidden');
                });
                
                if (buttonText.textContent.includes('Voir toutes')) {
                    buttonText.textContent = 'Masquer les contributions';
                } else {
                    buttonText.textContent = 'Voir toutes les contributions';
                }
            });
        }

        const showMoreCommentsBtn = document.getElementById('showMoreComments');
        if (showMoreCommentsBtn) {
            showMoreCommentsBtn.addEventListener('click', function() {
                const extraComments = document.querySelector('.extra-comments');
                const buttonText = document.getElementById('commentButtonText');
                
                if (extraComments.classList.contains('hidden')) {
                    // Afficher avec animation
                    extraComments.classList.remove('hidden');
                    extraComments.style.maxHeight = '0';
                    extraComments.style.overflow = 'hidden';
                    extraComments.style.transition = 'max-height 0.3s ease-out';
                    
                    // Calculer la hauteur totale
                    const scrollHeight = extraComments.scrollHeight;
                    
                    // Appliquer la hauteur
                    setTimeout(() => {
                        extraComments.style.maxHeight = scrollHeight + 'px';
                    }, 10);
                    
                    buttonText.textContent = 'Voir moins de commentaires';
                } else {
                    // Masquer avec animation
                    extraComments.style.maxHeight = '0';
                    setTimeout(() => {
                        extraComments.classList.add('hidden');
                    }, 300);
                    buttonText.textContent = 'Voir plus de commentaires';
                }
            });
        }
        
        // FAQ accordion functionality
        const faqHeaders = document.querySelectorAll('.faq-header');
        
        faqHeaders.forEach(header => {
            header.addEventListener('click', function() {
                const faqItem = this.closest('.faq-item');
                const content = faqItem.querySelector('.faq-content');
                const icon = this.querySelector('.faq-icon');
                
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
</x-app-layout>

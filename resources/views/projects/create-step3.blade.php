<x-app-layout>
    <x-dashboard-sidebar>
<div class="py-8">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- En-tête -->
        <div class="mb-8 text-center">
            <h1 class="text-3xl font-bold text-gray-900">Finalisez votre projet</h1>
            <p class="mt-2 text-gray-600">Ajoutez les derniers détails avant de lancer votre campagne</p>
        </div>
        
        <!-- Formulaire -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
            <form action="{{ route('projects.store-step3') }}" method="POST" enctype="multipart/form-data">
                @csrf
                
                <!-- Affiche les erreurs de validation -->
                @if ($errors->any())
                    <div class="bg-red-50 border-l-4 border-red-500 p-4 mb-6 mx-6 mt-6">
                        <div class="flex">
                            <div class="flex-shrink-0">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 text-red-500">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126zM12 15.75h.007v.008H12v-.008z" />
                                </svg>
                            </div>
                            <div class="ml-3">
                                <h3 class="text-sm font-medium text-red-800">Veuillez corriger les erreurs suivantes :</h3>
                                <ul class="mt-1 text-xs text-red-700 list-disc list-inside">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                @endif

                <!-- Étapes du formulaire -->
                <div class="border-b border-gray-100">
                    <div class="flex justify-between px-6 py-4">
                        <div class="flex items-center text-gray-400">
                            <div class="flex items-center justify-center w-8 h-8 rounded-full bg-gray-100 text-gray-500 font-medium">1</div>
                            <span class="ml-2 text-sm font-medium">Informations de base</span>
                        </div>
                        <div class="flex items-center text-gray-400">
                            <div class="flex items-center justify-center w-8 h-8 rounded-full bg-gray-100 text-gray-500 font-medium">2</div>
                            <span class="ml-2 text-sm font-medium">Médias</span>
                        </div>
                        <div class="flex items-center">
                            <div class="flex items-center justify-center w-8 h-8 rounded-full bg-lime-500 text-white font-medium">3</div>
                            <span class="ml-2 text-sm font-medium text-gray-900">Finalisation</span>
                        </div>
                    </div>
                </div>

                <!-- Champs cachés avec les données des étapes précédentes -->
                @foreach($step1_data as $name => $value)
                    <input type="hidden" name="{{ $name }}" value="{{ $value }}">
                @endforeach
                
                @foreach($step2_data as $name => $value)
                    @if(is_array($value))
                        @foreach($value as $key => $item)
                            <input type="hidden" name="{{ $name }}[{{ $key }}]" value="{{ $item }}">
                        @endforeach
                    @else
                        <input type="hidden" name="{{ $name }}" value="{{ $value }}">
                    @endif
                @endforeach

                <!-- Champs pour la finalisation -->
                <div class="p-6 sm:p-8 space-y-6">
                    <!-- Résumé du projet -->
                    <div>
                        <label for="summary" class="block text-sm font-medium text-gray-700 mb-1">Résumé du projet</label>
                        <div class="relative">
                            <textarea name="summary" id="summary" rows="3" class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:ring-lime-500 focus:border-lime-500 transition" required placeholder="Résumez votre projet en quelques phrases">{{ old('summary') }}</textarea>
                        </div>
                        <p class="mt-1 text-xs text-gray-500">Ce résumé sera affiché sur la page de liste des projets.</p>
                    </div>

                    <!-- Risques et défis -->
                    <div>
                        <label for="risks" class="block text-sm font-medium text-gray-700 mb-1">Risques et défis</label>
                        <div class="relative">
                            <textarea name="risks" id="risks" rows="3" class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:ring-lime-500 focus:border-lime-500 transition" placeholder="Décrivez les risques et défis potentiels de votre projet">{{ old('risks') }}</textarea>
                        </div>
                        <p class="mt-1 text-xs text-gray-500">Soyez transparent sur les défis que vous pourriez rencontrer.</p>
                    </div>

                    <!-- Paliers de financement -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Paliers de financement</label>
                        <p class="text-sm text-gray-500 mb-4">Définissez des objectifs intermédiaires pour votre projet.</p>
                        
                        <div id="funding-tiers" class="space-y-4">
                            <!-- Palier 1 -->
                            <div class="funding-tier p-4 border border-gray-200 rounded-lg">
                                <div class="flex justify-between items-center mb-2">
                                    <h4 class="text-sm font-medium text-gray-900">Palier 1</h4>
                                </div>
                                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mb-2">
                                    <div>
                                        <label for="tier_amount_1" class="block text-xs font-medium text-gray-700 mb-1">Montant (€)</label>
                                        <div class="relative rounded-lg">
                                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                                <span class="text-gray-500 sm:text-xs">€</span>
                                            </div>
                                            <input type="number" name="tier_amount[]" id="tier_amount_1" class="w-full pl-7 pr-4 py-2 border border-gray-200 rounded-lg focus:ring-lime-500 focus:border-lime-500 transition" placeholder="0">
                                        </div>
                                    </div>
                                    <div>
                                        <label for="tier_title_1" class="block text-xs font-medium text-gray-700 mb-1">Titre</label>
                                        <input type="text" name="tier_title[]" id="tier_title_1" class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:ring-lime-500 focus:border-lime-500 transition" placeholder="Ex: Premier objectif">
                                    </div>
                                </div>
                                <div>
                                    <label for="tier_description_1" class="block text-xs font-medium text-gray-700 mb-1">Description</label>
                                    <textarea name="tier_description[]" id="tier_description_1" rows="2" class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:ring-lime-500 focus:border-lime-500 transition" placeholder="Ce que vous ferez si vous atteignez ce palier"></textarea>
                                </div>
                            </div>
                            
                            <!-- Palier 2 -->
                            <div class="funding-tier p-4 border border-gray-200 rounded-lg">
                                <div class="flex justify-between items-center mb-2">
                                    <h4 class="text-sm font-medium text-gray-900">Palier 2</h4>
                                </div>
                                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mb-2">
                                    <div>
                                        <label for="tier_amount_2" class="block text-xs font-medium text-gray-700 mb-1">Montant (€)</label>
                                        <div class="relative rounded-lg">
                                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                                <span class="text-gray-500 sm:text-xs">€</span>
                                            </div>
                                            <input type="number" name="tier_amount[]" id="tier_amount_2" class="w-full pl-7 pr-4 py-2 border border-gray-200 rounded-lg focus:ring-lime-500 focus:border-lime-500 transition" placeholder="0">
                                        </div>
                                    </div>
                                    <div>
                                        <label for="tier_title_2" class="block text-xs font-medium text-gray-700 mb-1">Titre</label>
                                        <input type="text" name="tier_title[]" id="tier_title_2" class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:ring-lime-500 focus:border-lime-500 transition" placeholder="Ex: Objectif intermédiaire">
                                    </div>
                                </div>
                                <div>
                                    <label for="tier_description_2" class="block text-xs font-medium text-gray-700 mb-1">Description</label>
                                    <textarea name="tier_description[]" id="tier_description_2" rows="2" class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:ring-lime-500 focus:border-lime-500 transition" placeholder="Ce que vous ferez si vous atteignez ce palier"></textarea>
                                </div>
                            </div>
                        </div>
                        
                        <button type="button" id="add-tier" class="mt-2 inline-flex items-center px-3 py-1.5 text-xs font-medium text-lime-600 bg-lime-50 rounded-lg hover:bg-lime-100 transition-colors">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 mr-1">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                            </svg>
                            Ajouter un palier
                        </button>
                    </div>

                    <!-- FAQ -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">FAQ</label>
                        <p class="text-sm text-gray-500 mb-4">Ajoutez des questions fréquemment posées pour aider les contributeurs potentiels.</p>
                        
                        <div id="faq-items" class="space-y-4">
                            <!-- Question 1 -->
                            <div class="faq-item p-4 border border-gray-200 rounded-lg">
                                <div class="flex justify-between items-center mb-2">
                                    <h4 class="text-sm font-medium text-gray-900">Question 1</h4>
                                </div>
                                <div class="mb-2">
                                    <label for="faq_question_1" class="block text-xs font-medium text-gray-700 mb-1">Question</label>
                                    <input type="text" name="faq_question[]" id="faq_question_1" class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:ring-lime-500 focus:border-lime-500 transition" placeholder="Ex: Comment les fonds seront-ils utilisés ?">
                                </div>
                                <div>
                                    <label for="faq_answer_1" class="block text-xs font-medium text-gray-700 mb-1">Réponse</label>
                                    <textarea name="faq_answer[]" id="faq_answer_1" rows="2" class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:ring-lime-500 focus:border-lime-500 transition" placeholder="Votre réponse à cette question"></textarea>
                                </div>
                            </div>
                            
                            <!-- Question 2 -->
                            <div class="faq-item p-4 border border-gray-200 rounded-lg">
                                <div class="flex justify-between items-center mb-2">
                                    <h4 class="text-sm font-medium text-gray-900">Question 2</h4>
                                </div>
                                <div class="mb-2">
                                    <label for="faq_question_2" class="block text-xs font-medium text-gray-700 mb-1">Question</label>
                                    <input type="text" name="faq_question[]" id="faq_question_2" class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:ring-lime-500 focus:border-lime-500 transition" placeholder="Ex: Quel est le calendrier du projet ?">
                                </div>
                                <div>
                                    <label for="faq_answer_2" class="block text-xs font-medium text-gray-700 mb-1">Réponse</label>
                                    <textarea name="faq_answer[]" id="faq_answer_2" rows="2" class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:ring-lime-500 focus:border-lime-500 transition" placeholder="Votre réponse à cette question"></textarea>
                                </div>
                            </div>
                        </div>
                        
                        <button type="button" id="add-faq" class="mt-2 inline-flex items-center px-3 py-1.5 text-xs font-medium text-lime-600 bg-lime-50 rounded-lg hover:bg-lime-100 transition-colors">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 mr-1">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                            </svg>
                            Ajouter une question
                        </button>
                    </div>

                    <!-- Option pour enregistrer comme brouillon -->
                    <div class="flex items-start">
                        <div class="flex items-center h-5">
                            <input id="is_draft" name="is_draft" type="checkbox" class="h-4 w-4 text-lime-600 border-gray-300 rounded focus:ring-lime-500" {{ old('is_draft') ? 'checked' : '' }}>
                        </div>
                        <div class="ml-3 text-sm">
                            <label for="is_draft" class="font-medium text-gray-700">Enregistrer comme brouillon</label>
                            <p class="text-gray-500">Votre projet ne sera pas visible publiquement tant que vous ne le publierez pas.</p>
                        </div>
                    </div>
                </div>

                <!-- Boutons de navigation -->
                <div class="px-6 py-4 bg-gray-50 border-t border-gray-100 flex items-center justify-between">
                    <a href="{{ route('projects.create-step2') }}" class="inline-flex items-center px-4 py-2 border border-gray-300 rounded-lg text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-lime-500 transition-colors">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 mr-2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18" />
                        </svg>
                        Précédent
                    </a>
                    <button type="submit" class="inline-flex items-center px-6 py-3 bg-lime-500 text-white rounded-full text-sm font-semibold hover:bg-lime-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-lime-500 transition-colors shadow-sm">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 mr-2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        Lancer le projet
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Ajouter un palier de financement
        const addTierButton = document.getElementById('add-tier');
        const fundingTiersContainer = document.getElementById('funding-tiers');
        let tierCount = 2; // Déjà 2 paliers par défaut
        
        addTierButton.addEventListener('click', function() {
            tierCount++;
            
            const newTier = document.createElement('div');
            newTier.className = 'funding-tier p-4 border border-gray-200 rounded-lg';
            newTier.innerHTML = `
                <div class="flex justify-between items-center mb-2">
                    <h4 class="text-sm font-medium text-gray-900">Palier ${tierCount}</h4>
                    <button type="button" class="remove-tier text-xs text-red-600 hover:text-red-800">Supprimer</button>
                </div>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mb-2">
                    <div>
                        <label for="tier_amount_${tierCount}" class="block text-xs font-medium text-gray-700 mb-1">Montant (€)</label>
                        <div class="relative rounded-lg">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <span class="text-gray-500 sm:text-xs">€</span>
                            </div>
                            <input type="number" name="tier_amount[]" id="tier_amount_${tierCount}" class="w-full pl-7 pr-4 py-2 border border-gray-200 rounded-lg focus:ring-lime-500 focus:border-lime-500 transition" placeholder="0">
                        </div>
                    </div>
                    <div>
                        <label for="tier_title_${tierCount}" class="block text-xs font-medium text-gray-700 mb-1">Titre</label>
                        <input type="text" name="tier_title[]" id="tier_title_${tierCount}" class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:ring-lime-500 focus:border-lime-500 transition" placeholder="Ex: Objectif supplémentaire">
                    </div>
                </div>
                <div>
                    <label for="tier_description_${tierCount}" class="block text-xs font-medium text-gray-700 mb-1">Description</label>
                    <textarea name="tier_description[]" id="tier_description_${tierCount}" rows="2" class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:ring-lime-500 focus:border-lime-500 transition" placeholder="Ce que vous ferez si vous atteignez ce palier"></textarea>
                </div>
            `;
            
            fundingTiersContainer.appendChild(newTier);
            
            // Ajouter l'événement de suppression
            const removeButton = newTier.querySelector('.remove-tier');
            removeButton.addEventListener('click', function() {
                newTier.remove();
            });
        });
        
        // Ajouter une question FAQ
        const addFaqButton = document.getElementById('add-faq');
        const faqItemsContainer = document.getElementById('faq-items');
        let faqCount = 2; // Déjà 2 questions par défaut
        
        addFaqButton.addEventListener('click', function() {
            faqCount++;
            
            const newFaq = document.createElement('div');
            newFaq.className = 'faq-item p-4 border border-gray-200 rounded-lg';
            newFaq.innerHTML = `
                <div class="flex justify-between items-center mb-2">
                    <h4 class="text-sm font-medium text-gray-900">Question ${faqCount}</h4>
                    <button type="button" class="remove-faq text-xs text-red-600 hover:text-red-800">Supprimer</button>
                </div>
                <div class="mb-2">
                    <label for="faq_question_${faqCount}" class="block text-xs font-medium text-gray-700 mb-1">Question</label>
                    <input type="text" name="faq_question[]" id="faq_question_${faqCount}" class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:ring-lime-500 focus:border-lime-500 transition" placeholder="Votre question">
                </div>
                <div>
                    <label for="faq_answer_${faqCount}" class="block text-xs font-medium text-gray-700 mb-1">Réponse</label>
                    <textarea name="faq_answer[]" id="faq_answer_${faqCount}" rows="2" class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:ring-lime-500 focus:border-lime-500 transition" placeholder="Votre réponse à cette question"></textarea>
                </div>
            `;
            
            faqItemsContainer.appendChild(newFaq);
            
            // Ajouter l'événement de suppression
            const removeButton = newFaq.querySelector('.remove-faq');
            removeButton.addEventListener('click', function() {
                newFaq.remove();
            });
        });
    });
</script>
</x-dashboard-sidebar>
</x-app-layout>



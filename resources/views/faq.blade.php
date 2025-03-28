<x-app-layout>
    @include('layouts.navigation')
<section class="relative mb-12">
    <div class="relative rounded-lg mx-6 overflow-hidden">
        <img src="{{ asset('images/hands.jpg') }}" alt="Questions et réponses" class="w-full  h-[220px] md:h-[300px] object-cover">
        <div class="absolute inset-0 bg-gray-800/40"></div>
        <div class="absolute inset-0 flex flex-col justify-center px-8 md:px-12">
            <h1 class="text-white text-4xl md:text-5xl font-bold mb-4">Foire Aux Questions</h1>
            <p class="text-white text-xl md:text-2xl font-medium max-w-2xl">Trouvez des réponses à toutes vos questions sur le fonctionnement de Fund.</p>
        </div>
    </div>
</section>

<!-- FAQ Introduction -->
<section class="px-6 mb-12">
    <div class="container mx-auto max-w-6xl">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold mb-4">Comment pouvons-nous vous aider ?</h2>
            <div class="w-20 h-1 bg-lime-500 mx-auto mb-6"></div>
            <p class="text-gray-600 max-w-3xl mx-auto">Nous avons rassemblé les questions les plus fréquemment posées pour vous aider à mieux comprendre notre plateforme. Si vous ne trouvez pas la réponse à votre question, n'hésitez pas à nous contacter.</p>
        </div>
        
        <!-- Search Bar -->
        <div class="max-w-2xl mx-auto mb-16">
            <div class="relative">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 text-gray-400">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                    </svg>
                </div>
                <input type="text" id="faq-search" placeholder="Rechercher une question..." class="block w-full pl-10 pr-3 py-4 border border-gray-200 rounded-lg focus:ring-lime-500 focus:border-lime-500 shadow-sm">
            </div>
        </div>
    </div>
</section>

<!-- FAQ Categories and Questions -->
<section class="px-6 mb-20">
    <div class="container mx-auto max-w-6xl">
        <!-- Category Tabs -->
        <div class="mb-12 border-b border-gray-200">
            <div class="flex flex-wrap -mb-px">
                <button class="category-tab active mr-2 inline-block p-4 border-b-2 border-lime-500 rounded-t-lg text-lime-600 font-medium" data-category="general">
                    Questions générales
                </button>
                <button class="category-tab mr-2 inline-block p-4 border-b-2 border-transparent rounded-t-lg hover:text-gray-600 hover:border-gray-300 font-medium" data-category="creators">
                    Pour les porteurs de projets
                </button>
                <button class="category-tab mr-2 inline-block p-4 border-b-2 border-transparent rounded-t-lg hover:text-gray-600 hover:border-gray-300 font-medium" data-category="contributors">
                    Pour les contributeurs
                </button>
                <button class="category-tab mr-2 inline-block p-4 border-b-2 border-transparent rounded-t-lg hover:text-gray-600 hover:border-gray-300 font-medium" data-category="payments">
                    Paiements et sécurité
                </button>
                <button class="category-tab inline-block p-4 border-b-2 border-transparent rounded-t-lg hover:text-gray-600 hover:border-gray-300 font-medium" data-category="legal">
                    Aspects légaux et fiscaux
                </button>
            </div>
        </div>
        
        <!-- FAQ Content -->
        <div class="max-w-3xl mx-auto">
            <!-- General Questions -->
            <div id="general" class="faq-category">
                <h3 class="text-2xl font-bold mb-6">Questions générales</h3>
                
                <div class="space-y-4">
                    <div class="border-b pb-4 faq-item">
                        <div class="flex justify-between items-center cursor-pointer faq-header">
                            <h4 class="font-medium">Qu'est-ce que Fund ?</h4>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                            </svg>
                        </div>
                        <div class="faq-content overflow-hidden max-h-0 transition-all duration-300">
                            <p class="pt-4 text-gray-600">Fund est une plateforme de financement participatif qui permet aux porteurs de projets de présenter leurs idées et de collecter des fonds auprès d'une communauté de contributeurs. Notre mission est de démocratiser le financement participatif en créant une plateforme accessible, transparente et efficace.</p>
                        </div>
                    </div>
                    
                    <div class="border-b pb-4 faq-item">
                        <div class="flex justify-between items-center cursor-pointer faq-header">
                            <h4 class="font-medium">Comment fonctionne Fund ?</h4>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                            </svg>
                        </div>
                        <div class="faq-content overflow-hidden max-h-0 transition-all duration-300">
                            <p class="pt-4 text-gray-600">Le fonctionnement de Fund est simple : les porteurs de projets créent une campagne en décrivant leur projet, en fixant un objectif de financement et une durée. Les contributeurs peuvent alors découvrir ces projets et y contribuer financièrement. Selon le modèle choisi, les fonds sont versés au porteur de projet soit à la fin de la campagne si l'objectif est atteint (modèle "Tout ou rien"), soit quel que soit le montant collecté (modèle "Flexible"), soit de manière récurrente (modèle "Abonnement").</p>
                        </div>
                    </div>
                    
                    <div class="border-b pb-4 faq-item">
                        <div class="flex justify-between items-center cursor-pointer faq-header">
                            <h4 class="font-medium">Quels types de projets peut-on trouver sur Fund ?</h4>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                            </svg>
                        </div>
                        <div class="faq-content overflow-hidden max-h-0 transition-all duration-300">
                            <p class="pt-4 text-gray-600">Fund accueille une grande variété de projets dans différentes catégories : art, musique, film, technologie, design, jeux, éducation, environnement, santé, sport, alimentation, mode, etc. Tous les projets doivent respecter nos conditions d'utilisation et présenter un objectif clair et réalisable.</p>
                        </div>
                    </div>
                    
                    <div class="border-b pb-4 faq-item">
                        <div class="flex justify-between items-center cursor-pointer faq-header">
                            <h4 class="font-medium">Fund est-il disponible dans mon pays ?</h4>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                            </svg>
                        </div>
                        <div class="faq-content overflow-hidden max-h-0 transition-all duration-300">
                            <p class="pt-4 text-gray-600">Fund est actuellement disponible dans plus de 45 pays à travers le monde. Pour vérifier si votre pays est éligible, consultez la liste complète dans nos conditions d'utilisation ou contactez notre service client.</p>
                        </div>
                    </div>
                    
                    <div class="border-b pb-4 faq-item">
                        <div class="flex justify-between items-center cursor-pointer faq-header">
                            <h4 class="font-medium">Comment contacter le support client de Fund ?</h4>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                            </svg>
                        </div>
                        <div class="faq-content overflow-hidden max-h-0 transition-all duration-300">
                            <p class="pt-4 text-gray-600">Vous pouvez contacter notre équipe de support client par email à support@fund.com, par téléphone au +33 1 23 45 67 89 (du lundi au vendredi, de 9h à 18h) ou via le formulaire de contact disponible sur notre site. Nous nous efforçons de répondre à toutes les demandes dans un délai de 24 heures ouvrées.</p>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- For Project Creators -->
            <div id="creators" class="faq-category hidden">
                <h3 class="text-2xl font-bold mb-6">Pour les porteurs de projets</h3>
                
                <div class="space-y-4">
                    <div class="border-b pb-4 faq-item">
                        <div class="flex justify-between items-center cursor-pointer faq-header">
                            <h4 class="font-medium">Comment créer un projet sur Fund ?</h4>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                            </svg>
                        </div>
                        <div class="faq-content overflow-hidden max-h-0 transition-all duration-300">
                            <p class="pt-4 text-gray-600">Pour créer un projet sur Fund, vous devez d'abord créer un compte. Ensuite, cliquez sur "Lancer un projet" et suivez les étapes guidées : définissez votre projet, fixez un objectif de financement, choisissez une durée, ajoutez des médias (photos, vidéos) et une description détaillée, définissez vos contreparties, et soumettez votre projet pour validation. Notre équipe examinera votre projet et vous donnera un retour dans les 3 jours ouvrés.</p>
                        </div>
                    </div>
                    
                    <div class="border-b pb-4 faq-item">
                        <div class="flex justify-between items-center cursor-pointer faq-header">
                            <h4 class="font-medium">Quels sont les frais pour les porteurs de projets ?</h4>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                            </svg>
                        </div>
                        <div class="faq-content overflow-hidden max-h-0 transition-all duration-300">
                            <p class="pt-4 text-gray-600">Les frais varient selon le modèle de financement choisi : 5% du montant collecté pour le modèle "Tout ou rien" (uniquement si l'objectif est atteint), 8% pour le modèle "Flexible" (quel que soit le montant atteint), et 3% par transaction pour le modèle "Abonnement". Des frais de traitement de paiement de 1,5% + 0,25€ par transaction s'appliquent en plus des frais de plateforme.</p>
                        </div>
                    </div>
                    
                    <div class="border-b pb-4 faq-item">
                        <div class="flex justify-between items-center cursor-pointer faq-header">
                            <h4 class="font-medium">Comment fixer un objectif de financement réaliste ?</h4>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                            </svg>
                        </div>
                        <div class="faq-content overflow-hidden max-h-0 transition-all duration-300">
                            <p class="pt-4 text-gray-600">Pour fixer un objectif réaliste, calculez précisément le budget nécessaire à la réalisation de votre projet (matériaux, main d'œuvre, marketing, logistique, etc.), ajoutez les frais de plateforme et de traitement des paiements, et prévoyez une marge pour les imprévus. N'oubliez pas que vous devrez également financer les contreparties promises aux contributeurs. Il est préférable de fixer un objectif minimum viable et de prévoir des paliers supplémentaires en cas de dépassement de l'objectif.</p>
                        </div>
                    </div>
                    
                    <div class="border-b pb-4 faq-item">
                        <div class="flex justify-between items-center cursor-pointer faq-header">
                            <h4 class="font-medium">Quelle est la durée idéale pour une campagne ?</h4>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                            </svg>
                        </div>
                        <div class="faq-content overflow-hidden max-h-0 transition-all duration-300">
                            <p class="pt-4 text-gray-600">La durée idéale pour une campagne de financement participatif est généralement entre 30 et 45 jours. Une durée trop courte peut ne pas laisser suffisamment de temps pour atteindre votre objectif, tandis qu'une durée trop longue peut diluer l'urgence et l'élan de votre campagne. Nos statistiques montrent que les campagnes de 30 jours ont le taux de réussite le plus élevé.</p>
                        </div>
                    </div>
                    
                    <div class="border-b pb-4 faq-item">
                        <div class="flex justify-between items-center cursor-pointer faq-header">
                            <h4 class="font-medium">Comment promouvoir efficacement mon projet ?</h4>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                            </svg>
                        </div>
                        <div class="faq-content overflow-hidden max-h-0 transition-all duration-300">
                            <p class="pt-4 text-gray-600">La promotion est essentielle au succès de votre campagne. Commencez par mobiliser votre réseau personnel (famille, amis, collègues) avant même le lancement. Utilisez les réseaux sociaux, créez une newsletter, contactez des blogs et médias spécialisés dans votre domaine, organisez des événements, et publiez régulièrement des mises à jour sur votre projet. N'hésitez pas à utiliser notre guide de promotion disponible dans votre espace porteur de projet.</p>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- For Contributors -->
            <div id="contributors" class="faq-category hidden">
                <h3 class="text-2xl font-bold mb-6">Pour les contributeurs</h3>
                
                <div class="space-y-4">
                    <div class="border-b pb-4 faq-item">
                        <div class="flex justify-between items-center cursor-pointer faq-header">
                            <h4 class="font-medium">Comment contribuer à un projet ?</h4>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                            </svg>
                        </div>
                        <div class="faq-content overflow-hidden max-h-0 transition-all duration-300">
                            <p class="pt-4 text-gray-600">Pour contribuer à un projet, il vous suffit de créer un compte sur Fund, de parcourir les projets ou d'en rechercher un spécifique, de cliquer sur le projet qui vous intéresse, de choisir le montant de votre contribution et éventuellement une contrepartie, puis de procéder au paiement via notre système sécurisé. Vous recevrez une confirmation par email et pourrez suivre l'avancement du projet dans votre espace contributeur.</p>
                        </div>
                    </div>
                    
                    <div class="border-b pb-4 faq-item">
                        <div class="flex justify-between items-center cursor-pointer faq-header">
                            <h4 class="font-medium">Quels moyens de paiement sont acceptés ?</h4>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                            </svg>
                        </div>
                        <div class="faq-content overflow-hidden max-h-0 transition-all duration-300">
                            <p class="pt-4 text-gray-600">Fund accepte les cartes bancaires (Visa, Mastercard, American Express), PayPal, Apple Pay, Google Pay, et les virements bancaires pour certains pays. Tous les paiements sont sécurisés et vos informations bancaires ne sont jamais stockées sur nos serveurs.</p>
                        </div>
                    </div>
                    
                    <div class="border-b pb-4 faq-item">
                        <div class="flex justify-between items-center cursor-pointer faq-header">
                            <h4 class="font-medium">Que se passe-t-il si un projet n'atteint pas son objectif ?</h4>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                            </svg>
                        </div>
                        <div class="faq-content overflow-hidden max-h-0 transition-all duration-300">
                            <p class="pt-4 text-gray-600">Cela dépend du modèle de financement choisi par le porteur de projet. Dans le modèle "Tout ou rien", si le projet n'atteint pas son objectif, vous êtes intégralement remboursé (sans frais) sur votre moyen de paiement initial. Dans le modèle "Flexible", le porteur de projet reçoit les fonds même si l'objectif n'est pas atteint, et votre contribution n'est donc pas remboursée.</p>
                        </div>
                    </div>
                    
                    <div class="border-b pb-4 faq-item">
                        <div class="flex justify-between items-center cursor-pointer faq-header">
                            <h4 class="font-medium">Comment savoir si un projet est fiable ?</h4>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                            </svg>
                        </div>
                        <div class="faq-content overflow-hidden max-h-0 transition-all duration-300">
                            <p class="pt-4 text-gray-600">Bien que tous les projets soient vérifiés par notre équipe avant leur mise en ligne, nous vous recommandons de faire vos propres recherches. Examinez attentivement la description du projet, les antécédents du porteur de projet, la faisabilité du projet, et les commentaires des autres contributeurs. Les projets avec des objectifs clairs, des mises à jour régulières et une communication transparente sont généralement plus fiables.</p>
                        </div>
                    </div>
                    
                    <div class="border-b pb-4 faq-item">
                        <div class="flex justify-between items-center cursor-pointer faq-header">
                            <h4 class="font-medium">Puis-je annuler ma contribution ?</h4>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                            </svg>
                        </div>
                        <div class="faq-content overflow-hidden max-h-0 transition-all duration-300">
                            <p class="pt-4 text-gray-600">Vous pouvez annuler votre contribution à tout moment avant la fin de la campagne. Pour ce faire, connectez-vous à votre compte, accédez à la section "Mes contributions", trouvez le projet concerné et cliquez sur "Annuler ma contribution". Si la campagne est déjà terminée et a atteint son objectif, vous ne pourrez plus annuler votre contribution, sauf accord spécifique avec le porteur de projet.</p>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Payments and Security -->
            <div id="payments" class="faq-category hidden">
                <h3 class="text-2xl font-bold mb-6">Paiements et sécurité</h3>
                
                <div class="space-y-4">
                    <div class="border-b pb-4 faq-item">
                        <div class="flex justify-between items-center cursor-pointer faq-header">
                            <h4 class="font-medium">Comment Fund sécurise-t-il mes données personnelles ?</h4>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                            </svg>
                        </div>
                        <div class="faq-content overflow-hidden max-h-0 transition-all duration-300">
                            <p class="pt-4 text-gray-600">Fund prend très au sérieux la protection de vos données personnelles. Nous utilisons un cryptage SSL de pointe pour toutes les communications, nous ne stockons jamais vos informations de paiement sur nos serveurs (elles sont gérées par des prestataires de paiement certifiés PCI DSS), et nous respectons scrupuleusement le Règlement Général sur la Protection des Données (RGPD). Pour plus d'informations, consultez notre politique de confidentialité.</p>
                        </div>
                    </div>
                    
                    <div class="border-b pb-4 faq-item">
                        <div class="flex justify-between items-center cursor-pointer faq-header">
                            <h4 class="font-medium">Comment sont sécurisés les paiements sur Fund ?</h4>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                            </svg>
                        </div>
                        <div class="faq-content overflow-hidden max-h-0 transition-all duration-300">
                            <p class="pt-4 text-gray-600">Tous les paiements sur Fund sont traités par des prestataires de paiement de confiance comme Stripe et PayPal, qui utilisent les technologies de sécurité les plus avancées. Vos informations de paiement sont cryptées et ne transitent jamais par nos serveurs. Nous utilisons également l'authentification 3D Secure pour les paiements par carte bancaire, ajoutant une couche de sécurité supplémentaire.</p>
                        </div>
                    </div>
                    
                    <div class="border-b pb-4 faq-item">
                        <div class="flex justify-between items-center cursor-pointer faq-header">
                            <h4 class="font-medium">Comment sont versés les fonds aux porteurs de projet ?</h4>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                            </svg>
                        </div>
                        <div class="faq-content overflow-hidden max-h-0 transition-all duration-300">
                            <p class="pt-4 text-gray-600">Les fonds sont versés par virement bancaire dans les 15 jours suivant la fin de la campagne (pour les modèles "Tout ou rien" et "Flexible") ou mensuellement (pour le modèle "Abonnement"). Les porteurs de projet doivent avoir fourni leurs coordonnées bancaires et vérifié leur identité. Les virements sont effectués vers le compte bancaire associé au projet, après déduction des frais de plateforme et de traitement des paiements.</p>
                        </div>
                    </div>
                    
                    <div class="border-b pb-4 faq-item">
                        <div class="flex justify-between items-center cursor-pointer faq-header">
                            <h4 class="font-medium">Que faire en cas de problème avec un paiement ?</h4>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                            </svg>
                        </div>
                        <div class="faq-content overflow-hidden max-h-0 transition-all duration-300">
                            <p class="pt-4 text-gray-600">En cas de problème avec un paiement (erreur, double paiement, etc.), contactez immédiatement notre service client via le formulaire de contact, par email à support@fund.com ou par téléphone. Précisez le numéro de la transaction, la date, le montant et la nature du problème. Notre équipe traitera votre demande dans les plus brefs délais et vous tiendra informé des démarches entreprises.</p>
                        </div>
                    </div>
                    
                    <div class="border-b pb-4 faq-item">
                        <div class="flex justify-between items-center cursor-pointer faq-header">
                            <h4 class="font-medium">Fund propose-t-il une protection contre la fraude ?</h4>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                            </svg>
                        </div>
                        <div class="faq-content overflow-hidden max-h-0 transition-all duration-300">
                            <p class="pt-4 text-gray-600">Oui, Fund dispose de systèmes de détection des fraudes et vérifie l'identité des porteurs de projet avant la mise en ligne de leur campagne. Nous surveillons également les activités suspectes et intervenons rapidement en cas de signalement. Si vous suspectez une fraude, signalez-le immédiatement à notre équipe via le bouton "Signaler" présent sur chaque page de projet ou contactez directement notre service client.</p>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Legal and Tax Aspects -->
            <div id="legal" class="faq-category hidden">
                <h3 class="text-2xl font-bold mb-6">Aspects légaux et fiscaux</h3>
                
                <div class="space-y-4">
                    <div class="border-b pb-4 faq-item">
                        <div class="flex justify-between items-center cursor-pointer faq-header">
                            <h4 class="font-medium">Quelles sont les implications fiscales pour les porteurs de projet ?</h4>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                            </svg>
                        </div>
                        <div class="faq-content overflow-hidden max-h-0 transition-all duration-300">
                            <p class="pt-4 text-gray-600">Les fonds collectés via Fund sont généralement considérés comme des revenus imposables. Les implications fiscales varient selon votre pays de résidence, votre statut (particulier, auto-entrepreneur, entreprise), et la nature de votre projet. Nous vous recommandons de consulter un expert-comptable ou un conseiller fiscal pour obtenir des conseils adaptés à votre situation. Fund émet des relevés de transactions que vous pouvez utiliser pour votre déclaration fiscale.</p>
                        </div>
                    </div>
                    
                    <div class="border-b pb-4 faq-item">
                        <div class="flex justify-between items-center cursor-pointer faq-header">
                            <h4 class="font-medium">Les contributions sont-elles déductibles des impôts ?</h4>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                            </svg>
                        </div>
                        <div class="faq-content overflow-hidden max-h-0 transition-all duration-300">
                            <p class="pt-4 text-gray-600">En général, les contributions à des projets sur Fund ne sont pas déductibles des impôts, car elles sont considérées comme des achats anticipés ou des dons sans avantage fiscal. Cependant, les contributions à certaines organisations à but non lucratif ou caritatives présentes sur notre plateforme peuvent être déductibles. Ces organisations sont clairement identifiées par un badge "Don déductible" sur leur page de projet et vous fourniront un reçu fiscal.</p>
                        </div>
                    </div>
                    
                    <div class="border-b pb-4 faq-item">
                        <div class="flex justify-between items-center cursor-pointer faq-header">
                            <h4 class="font-medium">Quelles sont les règles concernant la propriété intellectuelle ?</h4>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                            </svg>
                        </div>
                        <div class="faq-content overflow-hidden max-h-0 transition-all duration-300">
                            <p class="pt-4 text-gray-600">Les porteurs de projet conservent tous les droits de propriété intellectuelle sur leurs créations. En publiant du contenu sur Fund, vous accordez à Fund une licence non exclusive pour utiliser ce contenu à des fins de promotion de la plateforme. Les porteurs de projet sont responsables de s'assurer qu'ils détiennent les droits nécessaires sur tout le contenu qu'ils publient et qu'ils ne violent pas les droits de propriété intellectuelle de tiers.</p>
                        </div>
                    </div>
                    
                    <div class="border-b pb-4 faq-item">
                        <div class="flex justify-between items-center cursor-pointer faq-header">
                            <h4 class="font-medium">Quelles sont les obligations légales des porteurs de projet ?</h4>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                            </svg>
                        </div>
                        <div class="faq-content overflow-hidden max-h-0 transition-all duration-300">
                            <p class="pt-4 text-gray-600">Les porteurs de projet s'engagent à fournir des informations exactes, à respecter les lois en vigueur, à livrer les contreparties promises aux contributeurs, et à communiquer régulièrement sur l'avancement de leur projet. Ils sont également tenus de respecter les droits des consommateurs, notamment en matière de garantie et de droit de rétractation lorsque cela s'applique. En cas de non-respect de ces obligations, Fund se réserve le droit de suspendre le projet et de prendre les mesures appropriées.</p>
                        </div>
                    </div>
                    
                    <div class="border-b pb-4 faq-item">
                        <div class="flex justify-between items-center cursor-pointer faq-header">
                            <h4 class="font-medium">Comment Fund gère-t-il les litiges entre porteurs de projet et contributeurs ?</h4>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                            </svg>
                        </div>
                        <div class="faq-content overflow-hidden max-h-0 transition-all duration-300">
                            <p class="pt-4 text-gray-600">En cas de litige, nous encourageons d'abord le dialogue direct entre les parties. Si aucune solution n'est trouvée, notre équipe de médiation peut intervenir pour faciliter la résolution du conflit. Dans les cas graves (fraude, non-livraison des contreparties sans justification valable), Fund peut prendre des mesures comme la suspension du compte du porteur de projet, le blocage des fonds non encore versés, ou la transmission du dossier aux autorités compétentes. Consultez nos conditions d'utilisation pour plus de détails sur notre procédure de gestion des litiges.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Contact Section -->
<section class="bg-gray-50 py-20 px-6 mb-20">
    <div class="container mx-auto max-w-6xl">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold mb-4">Vous n'avez pas trouvé votre réponse ?</h2>
            <div class="w-20 h-1 bg-lime-500 mx-auto mb-6"></div>
            <p class="text-gray-600 max-w-3xl mx-auto">Notre équipe de support est disponible pour répondre à toutes vos questions. N'hésitez pas à nous contacter.</p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="bg-white p-8 rounded-xl shadow-sm border border-gray-100 text-center">
                <div class="bg-lime-100 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-6">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8 text-lime-600">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75" />
                    </svg>
                </div>
                <h3 class="text-xl font-bold mb-3">Email</h3>
                <p class="text-gray-600 mb-4">Envoyez-nous un email et nous vous répondrons dans les 24 heures ouvrées.</p>
                <a href="mailto:support@fund.com" class="text-lime-600 hover:text-lime-700 font-medium">support@fund.com</a>
            </div>
            
            <div class="bg-white p-8 rounded-xl shadow-sm border border-gray-100 text-center">
                <div class="bg-lime-100 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-6">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8 text-lime-600">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 002.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 01-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 00-1.091-.852H4.5A2.25 2.25 0 002.25 4.5v2.25z" />
                    </svg>
                </div>
                <h3 class="text-xl font-bold mb-3">Téléphone</h3>
                <p class="text-gray-600 mb-4">Appelez-nous du lundi au vendredi, de 9h à 18h (heure de Paris).</p>
                <a href="tel:+33123456789" class="text-lime-600 hover:text-lime-700 font-medium">+33 1 23 45 67 89</a>
            </div>
            
            <div class="bg-white p-8 rounded-xl shadow-sm border border-gray-100 text-center">
                <div class="bg-lime-100 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-6">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8 text-lime-600">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9.879 7.519c1.171-1.025 3.071-1.025 4.242 0 1.172 1.025 1.172 2.687 0 3.712-.203.179-.43.326-.67.442-.745.361-1.45.999-1.45 1.827v.75M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9 5.25h.008v.008H12v-.008z" />
                    </svg>
                </div>
                <h3 class="text-xl font-bold mb-3">Centre d'aide</h3>
                <p class="text-gray-600 mb-4">Consultez notre base de connaissances pour des guides détaillés et des tutoriels.</p>
                <a href="#" class="text-lime-600 hover:text-lime-700 font-medium">Visiter le centre d'aide</a>
            </div>
        </div>
    </div>
</section>

@include('partials.call-to-action')

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // FAQ accordion functionality
        const faqHeaders = document.querySelectorAll('.faq-header');
        
        faqHeaders.forEach(header => {
            header.addEventListener('click', function() {
                const faqItem = this.closest('.faq-item');
                const content = faqItem.querySelector('.faq-content');
                const icon = this.querySelector('svg');
                
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
        
        // Category tabs functionality
        const categoryTabs = document.querySelectorAll('.category-tab');
        const faqCategories = document.querySelectorAll('.faq-category');
        
        categoryTabs.forEach(tab => {
            tab.addEventListener('click', function() {
                // Remove active class from all tabs
                categoryTabs.forEach(t => {
                    t.classList.remove('active', 'border-lime-500', 'text-lime-600');
                    t.classList.add('border-transparent', 'hover:text-gray-600', 'hover:border-gray-300');
                });
                
                // Add active class to clicked tab
                this.classList.add('active', 'border-lime-500', 'text-lime-600');
                this.classList.remove('border-transparent', 'hover:text-gray-600', 'hover:border-gray-300');
                
                // Hide all categories
                faqCategories.forEach(category => {
                    category.classList.add('hidden');
                });
                
                // Show the selected category
                const categoryId = this.getAttribute('data-category');
                document.getElementById(categoryId).classList.remove('hidden');
            });
        });
        
        // Search functionality
        const searchInput = document.getElementById('faq-search');
        
        searchInput.addEventListener('input', function() {
            const searchTerm = this.value.toLowerCase();
            const faqItems = document.querySelectorAll('.faq-item');
            
            faqItems.forEach(item => {
                const question = item.querySelector('.faq-header h4').textContent.toLowerCase();
                const answer = item.querySelector('.faq-content p').textContent.toLowerCase();
                
                if (question.includes(searchTerm) || answer.includes(searchTerm)) {
                    item.style.display = 'block';
                } else {
                    item.style.display = 'none';
                }
            });
            
            // Show the category that has visible items
            if (searchTerm.length > 0) {
                faqCategories.forEach(category => {
                    const visibleItems = category.querySelectorAll('.faq-item[style="display: block"]');
                    if (visibleItems.length > 0) {
                        category.classList.remove('hidden');
                        
                        // Update the active tab
                        const categoryId = category.getAttribute('id');
                        categoryTabs.forEach(tab => {
                            if (tab.getAttribute('data-category') === categoryId) {
                                tab.classList.add('active', 'border-lime-500', 'text-lime-600');
                                tab.classList.remove('border-transparent', 'hover:text-gray-600', 'hover:border-gray-300');
                            } else {
                                tab.classList.remove('active', 'border-lime-500', 'text-lime-600');
                                tab.classList.add('border-transparent', 'hover:text-gray-600', 'hover:border-gray-300');
                            }
                        });
                    } else {
                        category.classList.add('hidden');
                    }
                });
            } else {
                // If search is cleared, show the active category
                faqCategories.forEach(category => {
                    if (category.id === document.querySelector('.category-tab.active').getAttribute('data-category')) {
                        category.classList.remove('hidden');
                    } else {
                        category.classList.add('hidden');
                    }
                });
            }
        });
    });
</script>
@include('layouts.footer')
</x-app-layout>

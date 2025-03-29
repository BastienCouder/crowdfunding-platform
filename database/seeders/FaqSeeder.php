<?php

namespace Database\Seeders;

use App\Models\Faq;
use Illuminate\Database\Seeder;

class FaqSeeder extends Seeder
{
    public function run()
    {
        $faqs = [
            // Questions générales
            [
                'question' => 'Qu\'est-ce que Fund ?',
                'answer' => 'Fund est une plateforme de financement participatif qui permet aux porteurs de projets de présenter leurs idées et de collecter des fonds auprès d\'une communauté de contributeurs. Notre mission est de démocratiser le financement participatif en créant une plateforme accessible, transparente et efficace.',
                'category' => 'general'
            ],
            [
                'question' => 'Comment fonctionne Fund ?',
                'answer' => 'Le fonctionnement de Fund est simple : les porteurs de projets créent une campagne en décrivant leur projet, en fixant un objectif de financement et une durée. Les contributeurs peuvent alors découvrir ces projets et y contribuer financièrement. Selon le modèle choisi, les fonds sont versés au porteur de projet soit à la fin de la campagne si l\'objectif est atteint (modèle "Tout ou rien"), soit quel que soit le montant collecté (modèle "Flexible"), soit de manière récurrente (modèle "Abonnement").',
                'category' => 'general'
            ],
            [
                'question' => 'Quels types de projets peut-on trouver sur Fund ?',
                'answer' => 'Fund accueille une grande variété de projets dans différentes catégories : art, musique, film, technologie, design, jeux, éducation, environnement, santé, sport, alimentation, mode, etc. Tous les projets doivent respecter nos conditions d\'utilisation et présenter un objectif clair et réalisable.',
                'category' => 'general'
            ],
            [
                'question' => 'Fund est-il disponible dans mon pays ?',
                'answer' => 'Fund est actuellement disponible dans plus de 45 pays à travers le monde. Pour vérifier si votre pays est éligible, consultez la liste complète dans nos conditions d\'utilisation ou contactez notre service client.',
                'category' => 'general'
            ],
            [
                'question' => 'Comment contacter le support client de Fund ?',
                'answer' => 'Vous pouvez contacter notre équipe de support client par email à support@fund.com, par téléphone au +33 1 23 45 67 89 (du lundi au vendredi, de 9h à 18h) ou via le formulaire de contact disponible sur notre site. Nous nous efforçons de répondre à toutes les demandes dans un délai de 24 heures ouvrées.',
                'category' => 'general'
            ],

            // Pour les porteurs de projets
            [
                'question' => 'Comment créer un projet sur Fund ?',
                'answer' => 'Pour créer un projet sur Fund, vous devez d\'abord créer un compte. Ensuite, cliquez sur "Lancer un projet" et suivez les étapes guidées : définissez votre projet, fixez un objectif de financement, choisissez une durée, ajoutez des médias (photos, vidéos) et une description détaillée, définissez vos contreparties, et soumettez votre projet pour validation. Notre équipe examinera votre projet et vous donnera un retour dans les 3 jours ouvrés.',
                'category' => 'creators'
            ],
            [
                'question' => 'Quels sont les frais pour les porteurs de projets ?',
                'answer' => 'Les frais varient selon le modèle de financement choisi : 5% du montant collecté pour le modèle "Tout ou rien" (uniquement si l\'objectif est atteint), 8% pour le modèle "Flexible" (quel que soit le montant atteint), et 3% par transaction pour le modèle "Abonnement". Des frais de traitement de paiement de 1,5% + 0,25€ par transaction s\'appliquent en plus des frais de plateforme.',
                'category' => 'creators'
            ],
            [
                'question' => 'Comment fixer un objectif de financement réaliste ?',
                'answer' => 'Pour fixer un objectif réaliste, calculez précisément le budget nécessaire à la réalisation de votre projet (matériaux, main d\'œuvre, marketing, logistique, etc.), ajoutez les frais de plateforme et de traitement des paiements, et prévoyez une marge pour les imprévus. N\'oubliez pas que vous devrez également financer les contreparties promises aux contributeurs. Il est préférable de fixer un objectif minimum viable et de prévoir des paliers supplémentaires en cas de dépassement de l\'objectif.',
                'category' => 'creators'
            ],
            [
                'question' => 'Quelle est la durée idéale pour une campagne ?',
                'answer' => 'La durée idéale pour une campagne de financement participatif est généralement entre 30 et 45 jours. Une durée trop courte peut ne pas laisser suffisamment de temps pour atteindre votre objectif, tandis qu\'une durée trop longue peut diluer l\'urgence et l\'élan de votre campagne. Nos statistiques montrent que les campagnes de 30 jours ont le taux de réussite le plus élevé.',
                'category' => 'creators'
            ],
            [
                'question' => 'Comment promouvoir efficacement mon projet ?',
                'answer' => 'La promotion est essentielle au succès de votre campagne. Commencez par mobiliser votre réseau personnel (famille, amis, collègues) avant même le lancement. Utilisez les réseaux sociaux, créez une newsletter, contactez des blogs et médias spécialisés dans votre domaine, organisez des événements, et publiez régulièrement des mises à jour sur votre projet. N\'hésitez pas à utiliser notre guide de promotion disponible dans votre espace porteur de projet.',
                'category' => 'creators'
            ],

            // Pour les contributeurs
            [
                'question' => 'Comment contribuer à un projet ?',
                'answer' => 'Pour contribuer à un projet, il vous suffit de créer un compte sur Fund, de parcourir les projets ou d\'en rechercher un spécifique, de cliquer sur le projet qui vous intéresse, de choisir le montant de votre contribution et éventuellement une contrepartie, puis de procéder au paiement via notre système sécurisé. Vous recevrez une confirmation par email et pourrez suivre l\'avancement du projet dans votre espace contributeur.',
                'category' => 'contributors'
            ],
            [
                'question' => 'Quels moyens de paiement sont acceptés ?',
                'answer' => 'Fund accepte les cartes bancaires (Visa, Mastercard, American Express), PayPal, Apple Pay, Google Pay, et les virements bancaires pour certains pays. Tous les paiements sont sécurisés et vos informations bancaires ne sont jamais stockées sur nos serveurs.',
                'category' => 'contributors'
            ],
            [
                'question' => 'Que se passe-t-il si un projet n\'atteint pas son objectif ?',
                'answer' => 'Cela dépend du modèle de financement choisi par le porteur de projet. Dans le modèle "Tout ou rien", si le projet n\'atteint pas son objectif, vous êtes intégralement remboursé (sans frais) sur votre moyen de paiement initial. Dans le modèle "Flexible", le porteur de projet reçoit les fonds même si l\'objectif n\'est pas atteint, et votre contribution n\'est donc pas remboursée.',
                'category' => 'contributors'
            ],
            [
                'question' => 'Comment savoir si un projet est fiable ?',
                'answer' => 'Bien que tous les projets soient vérifiés par notre équipe avant leur mise en ligne, nous vous recommandons de faire vos propres recherches. Examinez attentivement la description du projet, les antécédents du porteur de projet, la faisabilité du projet, et les commentaires des autres contributeurs. Les projets avec des objectifs clairs, des mises à jour régulières et une communication transparente sont généralement plus fiables.',
                'category' => 'contributors'
            ],
            [
                'question' => 'Puis-je annuler ma contribution ?',
                'answer' => 'Vous pouvez annuler votre contribution à tout moment avant la fin de la campagne. Pour ce faire, connectez-vous à votre compte, accédez à la section "Mes contributions", trouvez le projet concerné et cliquez sur "Annuler ma contribution". Si la campagne est déjà terminée et a atteint son objectif, vous ne pourrez plus annuler votre contribution, sauf accord spécifique avec le porteur de projet.',
                'category' => 'contributors'
            ],

            // Paiements et sécurité
            [
                'question' => 'Comment Fund sécurise-t-il mes données personnelles ?',
                'answer' => 'Fund prend très au sérieux la protection de vos données personnelles. Nous utilisons un cryptage SSL de pointe pour toutes les communications, nous ne stockons jamais vos informations de paiement sur nos serveurs (elles sont gérées par des prestataires de paiement certifiés PCI DSS), et nous respectons scrupuleusement le Règlement Général sur la Protection des Données (RGPD). Pour plus d\'informations, consultez notre politique de confidentialité.',
                'category' => 'payments'
            ],
            [
                'question' => 'Comment sont sécurisés les paiements sur Fund ?',
                'answer' => 'Tous les paiements sur Fund sont traités par des prestataires de paiement de confiance comme Stripe et PayPal, qui utilisent les technologies de sécurité les plus avancées. Vos informations de paiement sont cryptées et ne transitent jamais par nos serveurs. Nous utilisons également l\'authentification 3D Secure pour les paiements par carte bancaire, ajoutant une couche de sécurité supplémentaire.',
                'category' => 'payments'
            ],
            [
                'question' => 'Comment sont versés les fonds aux porteurs de projet ?',
                'answer' => 'Les fonds sont versés par virement bancaire dans les 15 jours suivant la fin de la campagne (pour les modèles "Tout ou rien" et "Flexible") ou mensuellement (pour le modèle "Abonnement"). Les porteurs de projet doivent avoir fourni leurs coordonnées bancaires et vérifié leur identité. Les virements sont effectués vers le compte bancaire associé au projet, après déduction des frais de plateforme et de traitement des paiements.',
                'category' => 'payments'
            ],
            [
                'question' => 'Que faire en cas de problème avec un paiement ?',
                'answer' => 'En cas de problème avec un paiement (erreur, double paiement, etc.), contactez immédiatement notre service client via le formulaire de contact, par email à support@fund.com ou par téléphone. Précisez le numéro de la transaction, la date, le montant et la nature du problème. Notre équipe traitera votre demande dans les plus brefs délais et vous tiendra informé des démarches entreprises.',
                'category' => 'payments'
            ],
            [
                'question' => 'Fund propose-t-il une protection contre la fraude ?',
                'answer' => 'Oui, Fund dispose de systèmes de détection des fraudes et vérifie l\'identité des porteurs de projet avant la mise en ligne de leur campagne. Nous surveillons également les activités suspectes et intervenons rapidement en cas de signalement. Si vous suspectez une fraude, signalez-le immédiatement à notre équipe via le bouton "Signaler" présent sur chaque page de projet ou contactez directement notre service client.',
                'category' => 'payments'
            ],

            // Aspects légaux et fiscaux
            [
                'question' => 'Quelles sont les implications fiscales pour les porteurs de projet ?',
                'answer' => 'Les fonds collectés via Fund sont généralement considérés comme des revenus imposables. Les implications fiscales varient selon votre pays de résidence, votre statut (particulier, auto-entrepreneur, entreprise), et la nature de votre projet. Nous vous recommandons de consulter un expert-comptable ou un conseiller fiscal pour obtenir des conseils adaptés à votre situation. Fund émet des relevés de transactions que vous pouvez utiliser pour votre déclaration fiscale.',
                'category' => 'legal'
            ],
            [
                'question' => 'Les contributions sont-elles déductibles des impôts ?',
                'answer' => 'En général, les contributions à des projets sur Fund ne sont pas déductibles des impôts, car elles sont considérées comme des achats anticipés ou des dons sans avantage fiscal. Cependant, les contributions à certaines organisations à but non lucratif ou caritatives présentes sur notre plateforme peuvent être déductibles. Ces organisations sont clairement identifiées par un badge "Don déductible" sur leur page de projet et vous fourniront un reçu fiscal.',
                'category' => 'legal'
            ],
            [
                'question' => 'Quelles sont les règles concernant la propriété intellectuelle ?',
                'answer' => 'Les porteurs de projet conservent tous les droits de propriété intellectuelle sur leurs créations. En publiant du contenu sur Fund, vous accordez à Fund une licence non exclusive pour utiliser ce contenu à des fins de promotion de la plateforme. Les porteurs de projet sont responsables de s\'assurer qu\'ils détiennent les droits nécessaires sur tout le contenu qu\'ils publient et qu\'ils ne violent pas les droits de propriété intellectuelle de tiers.',
                'category' => 'legal'
            ],
            [
                'question' => 'Quelles sont les obligations légales des porteurs de projet ?',
                'answer' => 'Les porteurs de projet s\'engagent à fournir des informations exactes, à respecter les lois en vigueur, à livrer les contreparties promises aux contributeurs, et à communiquer régulièrement sur l\'avancement de leur projet. Ils sont également tenus de respecter les droits des consommateurs, notamment en matière de garantie et de droit de rétractation lorsque cela s\'applique. En cas de non-respect de ces obligations, Fund se réserve le droit de suspendre le projet et de prendre les mesures appropriées.',
                'category' => 'legal'
            ],
            [
                'question' => 'Comment Fund gère-t-il les litiges entre porteurs de projet et contributeurs ?',
                'answer' => 'En cas de litige, nous encourageons d\'abord le dialogue direct entre les parties. Si aucune solution n\'est trouvée, notre équipe de médiation peut intervenir pour faciliter la résolution du conflit. Dans les cas graves (fraude, non-livraison des contreparties sans justification valable), Fund peut prendre des mesures comme la suspension du compte du porteur de projet, le blocage des fonds non encore versés, ou la transmission du dossier aux autorités compétentes. Consultez nos conditions d\'utilisation pour plus de détails sur notre procédure de gestion des litiges.',
                'category' => 'legal'
            ]
        ];

        foreach ($faqs as $faq) {
            Faq::create($faq);
        }
    }
}
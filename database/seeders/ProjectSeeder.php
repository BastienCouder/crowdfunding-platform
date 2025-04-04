<?php

namespace Database\Seeders;

use App\Models\Project;
use App\Models\Category;
use App\Models\User;
use App\Models\ProjectImage;
use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    public function run()
    {
        $categories = Category::all();
        $users = User::all();

        $projects = [
            [
                'title' => 'Parc éolien',
                'description' => 'Soutenez la construction d\'un parc éolien en Bretagne pour produire de l\'énergie renouvelable.',
                'summary' => 'Construction de 10 éoliennes en Bretagne pour une énergie propre',
                'goal_amount' => 150000,
                'current_amount' => 0,
                'category_id' => $categories->where('name', 'Énergie renouvelable')->first()->id,
                'is_draft' => false,
                'risks' => 'Risques liés aux retards de construction et aux aléas météorologiques',
                'video_url' => 'https://www.youtube.com/watch?v=example1',
                'funding_tiers' => [
                    ['amount' => 50, 'reward' => 'Remerciement personnalisé'],
                    ['amount' => 100, 'reward' => 'Visite virtuelle du parc'],
                    ['amount' => 500, 'reward' => 'Visite sur site et plaque de remerciement']
                ],
                'faqs' => [
                    ['question' => 'Quand commencera la construction ?', 'answer' => 'La construction débutera dès que 50% du financement sera atteint'],
                    ['question' => 'Quelle est la durée du projet ?', 'answer' => 'Le projet s\'étalera sur 18 mois']
                ],
                'images' => [
                    'https://images.unsplash.com/photo-1546883648-8c5648200abc?q=80&w=2074&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
                    'https://images.unsplash.com/photo-1598491621613-b1e4460573a0?q=80&w=2087&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
                    'https://images.unsplash.com/photo-1591500785381-d2ba7749e941?q=80&w=2069&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
                ],
            ],
            [
                'title' => 'Reforestation dans les Vosges',
                'description' => 'Aidez-nous à planter 5 000 arbres dans le massif des Vosges pour restaurer la biodiversité.',
                'summary' => 'Plantation de 5000 arbres pour restaurer les forêts vosgiennes',
                'goal_amount' => 25000,
                'current_amount' => 0,
                'category_id' => $categories->where('name', 'Écologie')->first()->id,
                'is_draft' => false,
                'risks' => 'Risques liés aux conditions climatiques et à la disponibilité des plants',
                'video_url' => 'https://www.youtube.com/watch?v=example2',
                'funding_tiers' => [
                    ['amount' => 20, 'reward' => 'Un arbre planté en votre nom'],
                    ['amount' => 50, 'reward' => 'Certificat de participation'],
                    ['amount' => 200, 'reward' => 'Participation à une journée de plantation']
                ],
                'faqs' => [
                    ['question' => 'Quelles essences seront plantées ?', 'answer' => 'Des essences locales adaptées au climat vosgien'],
                    ['question' => 'Qui s\'occupera de l\'entretien ?', 'answer' => 'Une équipe de forestiers professionnels']
                ],
                'images' => [
                    'https://images.unsplash.com/photo-1598064902710-b3b0ebb32ffd?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
                    'https://images.unsplash.com/photo-1647220576336-f2e94680f3b8?q=80&w=2071&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
                    'https://images.unsplash.com/photo-1676170535304-f3c790124bee?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
                ],
            ],
            [
                'title' => 'Ferme biologique',
                'description' => 'Soutenez une ferme biologique en Provence qui promeut une agriculture durable et locale.',
                'summary' => 'Développement d\'une ferme bio avec circuits courts en Provence',
                'goal_amount' => 50000,
                'current_amount' => 0,
                'category_id' => $categories->where('name', 'Agriculture durable')->first()->id,
                'is_draft' => false,
                'risks' => 'Risques liés aux aléas climatiques et aux maladies des cultures',
                'video_url' => 'https://www.youtube.com/watch?v=example3',
                'funding_tiers' => [
                    ['amount' => 30, 'reward' => 'Panier de légumes bio'],
                    ['amount' => 100, 'reward' => 'Visite de la ferme'],
                    ['amount' => 300, 'reward' => 'Abonnement annuel de paniers']
                ],
                'faqs' => [
                    ['question' => 'Quels produits seront cultivés ?', 'answer' => 'Légumes de saison, petits fruits et plantes aromatiques'],
                    ['question' => 'Où seront vendus les produits ?', 'answer' => 'En vente directe à la ferme et sur les marchés locaux']
                ],
                'images' => [
                    'https://images.unsplash.com/photo-1500651230702-0e2d8a49d4ad?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
                    'https://images.unsplash.com/photo-1529313780224-1a12b68bed16?q=80&w=1974&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
                    'https://images.unsplash.com/photo-1616364851431-b8c1de89d315?q=80&w=1974&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
                ],
            ],
            [
                'title' => 'Centre de recyclage',
                'description' => 'Financez un centre de recyclage innovant à Lyon pour réduire les déchets et promouvoir l\'économie circulaire.',
                'summary' => 'Création d\'un centre de tri et de valorisation des déchets à Lyon',
                'goal_amount' => 75000,
                'current_amount' => 0,
                'category_id' => $categories->where('name', 'Recyclage')->first()->id,
                'is_draft' => false,
                'risks' => 'Risques liés aux autorisations administratives et à la collecte des déchets',
                'video_url' => 'https://www.youtube.com/watch?v=example4',
                'funding_tiers' => [
                    ['amount' => 25, 'reward' => 'Guide du recyclage'],
                    ['amount' => 75, 'reward' => 'Visite du centre'],
                    ['amount' => 250, 'reward' => 'Atelier sur le recyclage pour 5 personnes']
                ],
                'faqs' => [
                    ['question' => 'Quels matériaux seront recyclés ?', 'answer' => 'Plastique, verre, métal et papier/carton'],
                    ['question' => 'Quel sera l\'impact environnemental ?', 'answer' => 'Réduction de 5000 tonnes de déchets par an']
                ],
                'images' => [
                    'https://images.unsplash.com/photo-1610093674388-cee0337f2684?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
                    'https://images.unsplash.com/photo-1621408422508-240627e2252a?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
                    'https://images.unsplash.com/photo-1611284446314-60a58ac0deb9?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
                ],
            ],
            [
                'title' => 'Protection des loups dans les Alpes',
                'description' => 'Participez à la protection des loups dans les Alpes françaises pour préserver la biodiversité.',
                'summary' => 'Programme de conservation et de suivi des loups dans les Alpes',
                'goal_amount' => 30000,
                'current_amount' => 0,
                'category_id' => $categories->where('name', 'Protection des animaux')->first()->id,
                'is_draft' => false,
                'risks' => 'Risques liés aux conflits avec les éleveurs et à la reproduction naturelle',
                'video_url' => 'https://www.youtube.com/watch?v=example5',
                'funding_tiers' => [
                    ['amount' => 40, 'reward' => 'Photo exclusive d\'un loup'],
                    ['amount' => 120, 'reward' => 'Adoption symbolique d\'un loup'],
                    ['amount' => 400, 'reward' => 'Participation à une sortie d\'observation']
                ],
                'faqs' => [
                    ['question' => 'Comment seront utilisés les fonds ?', 'answer' => 'Pour le suivi GPS, la recherche et la sensibilisation'],
                    ['question' => 'Qui mène ce projet ?', 'answer' => 'Une association de protection de la faune sauvage']
                ],
                'images' => [
                    'https://images.unsplash.com/photo-1572008125457-15e3be61ce3e?q=80&w=1932&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
                    'https://images.unsplash.com/photo-1558369359-32c0fb3c83cc?q=80&w=1958&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
                    'https://images.unsplash.com/photo-1629070314158-660a52fe9dd3?q=80&w=1933&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
                ],
            ],
        ];

        foreach ($projects as $projectData) {
            $project = Project::create([
                'user_id' => $users->random()->id,
                'title' => $projectData['title'],
                'description' => $projectData['description'],
                'summary' => $projectData['summary'],
                'goal_amount' => $projectData['goal_amount'],
                'current_amount' => $projectData['current_amount'],
                'start_date' => now(),
                'end_date' => now()->addMonths(6),
                'status' => 'pending',
                'category_id' => $projectData['category_id'],
                'is_draft' => $projectData['is_draft'],
                'risks' => $projectData['risks'],
                'video_url' => $projectData['video_url'],
                'funding_tiers' => $projectData['funding_tiers'],
                'faqs' => $projectData['faqs'],
            ]);
        
            foreach ($projectData['images'] as $index => $imageUrl) {
                try {
                    $imageContent = file_get_contents($imageUrl);
                    if ($imageContent !== false) {
                        $project->images()->create([
                            'image_data' => $imageContent, // Store binary data directly
                            'mime_type' => $this->guessMimeType($imageUrl),
                            'is_main' => $index === 0
                        ]);
                    }
                } catch (\Exception $e) {
      
                    continue;
                }
            }
        }
        
    }

    private function guessMimeType(string $url): string
    {
        $extension = pathinfo(parse_url($url, PHP_URL_PATH), PATHINFO_EXTENSION);
        
        return match(strtolower($extension)) {
            'jpg', 'jpeg' => 'image/jpeg',
            'png' => 'image/png',
            'gif' => 'image/gif',
            'webp' => 'image/webp',
            default => 'image/jpeg' // default
        };
    }
}
<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class MigrationCheckerController extends Controller
{
    public function updateMigrations()
    {
        $this->checkAndUpdateTable('projects', [
            'user_id' => 'bigInteger',
            'title' => 'string',
            'description' => 'text',
            'goal_amount' => 'decimal',
            'current_amount' => 'decimal',
            'start_date' => 'date',
            'end_date' => 'date',
            'status' => 'enum',
            'category_id' => 'bigInteger',
            'created_at' => 'timestamp',
            'updated_at' => 'timestamp',
        ]);

        $this->checkAndUpdateTable('contributions', [
            'user_id' => 'bigInteger',
            'project_id' => 'bigInteger',
            'amount' => 'decimal',
            'anonymous' => 'boolean',
            'created_at' => 'timestamp',
            'updated_at' => 'timestamp',
        ]);

        $this->checkAndUpdateTable('categories', [
            'name' => 'string',
            'description' => 'text',
            'created_at' => 'timestamp',
            'updated_at' => 'timestamp',
        ]);

        $this->checkAndUpdateTable('project_images', [
            'project_id' => 'bigInteger',
            'image_url' => 'string',
            'created_at' => 'timestamp',
            'updated_at' => 'timestamp',
        ]);

        $this->checkAndUpdateTable('comments', [
            'user_id' => 'bigInteger',
            'project_id' => 'bigInteger',
            'content' => 'text',
            'created_at' => 'timestamp',
            'updated_at' => 'timestamp',
        ]);
    }

    private function checkAndUpdateTable($tableName, $expectedColumns)
    {
        if (!Schema::hasTable($tableName)) {
            echo "Table '$tableName' n'existe pas.\n";
            return;
        }

        $existingColumns = Schema::getColumnListing($tableName);
        $missingColumns = array_diff(array_keys($expectedColumns), $existingColumns);

        if (empty($missingColumns)) {
            echo "Aucune colonne manquante pour la table '$tableName'.\n";
            return;
        }

        echo "Mise à jour de la table '$tableName' pour ajouter des colonnes manquantes : " . implode(', ', $missingColumns) . ".\n";

        Schema::table($tableName, function ($table) use ($missingColumns, $expectedColumns) {
            foreach ($missingColumns as $column) {
                switch ($expectedColumns[$column]) {
                    case 'bigInteger':
                        $table->bigInteger($column)->nullable();
                        break;
                    case 'string':
                        $table->string($column)->nullable();
                        break;
                    case 'text':
                        $table->text($column)->nullable();
                        break;
                    case 'decimal':
                        $table->decimal($column, 10, 2)->default(0);
                        break;
                    case 'boolean':
                        $table->boolean($column)->default(false);
                        break;
                    case 'enum':
                        $table->enum($column, ['pending', 'approved', 'rejected', 'completed'])->default('pending');
                        break;
                    case 'date':
                        $table->date($column)->nullable();
                        break;
                    case 'timestamp':
                        $table->timestamp($column)->nullable();
                        break;
                    default:
                        echo "Type de colonne inconnu pour '$column'.\n";
                        break;
                }
            }
        });
    }
}

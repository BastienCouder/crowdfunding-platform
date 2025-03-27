<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('title');
            $table->text('description');
            $table->text('summary')->nullable(); // Ajout du résumé
            $table->decimal('goal_amount', 10, 2);
            $table->decimal('current_amount', 10, 2)->default(0);
            $table->date('start_date');
            $table->date('end_date');
            $table->boolean('is_draft')->default(false);
            $table->text('risks')->nullable(); // Ajout des risques/défis
            $table->string('video_url')->nullable(); // Ajout de l'URL vidéo
            $table->enum('status', ['pending', 'approved', 'rejected', 'completed'])->default('pending');
            $table->foreignId('category_id')->constrained()->onDelete('cascade');
            $table->json('funding_tiers')->nullable(); // Stockage des paliers de financement
            $table->json('faqs')->nullable(); // Stockage des questions FAQ
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comments');
        Schema::dropIfExists('projects');
    }
};
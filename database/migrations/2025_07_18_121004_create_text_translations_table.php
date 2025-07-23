<?php

// database/migrations/xxxx_xx_xx_create_text_translations_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('text_translations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('text_id')->constrained()->onDelete('cascade');
            $table->foreignId('language_id')->constrained()->onDelete('cascade');
            $table->string('value');
            $table->timestamps();

            $table->unique(['text_id', 'language_id']); // Ensure one translation per language
        });
    }

    public function down(): void {
        Schema::dropIfExists('text_translations');
    }
};

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            
            // Nombre en los 4 idiomas
            $table->string('name_es');           // Castellano
            $table->string('name_ca')->nullable(); // Catalán
            $table->string('name_en')->nullable(); // Inglés
            $table->string('name_de')->nullable(); // Alemán
            
            // Descripción en los 4 idiomas
            $table->text('description_es')->nullable();           // Castellano
            $table->text('description_ca')->nullable(); // Catalán
            $table->text('description_en')->nullable(); // Inglés
            $table->text('description_de')->nullable(); // Alemán
            
            // Slug para URLs amigables
            $table->string('slug')->unique();
            
            // Imagen de la categoría
            $table->string('image')->nullable();
            
            // Orden de visualización
            $table->integer('order')->default(0);
            
            // Estado activo/inactivo
            $table->boolean('is_active')->default(true);
            
            // Categoría padre (para subcategorías)
            $table->foreignId('parent_id')->nullable()->constrained('categories')->onDelete('set null');
            
            $table->timestamps();
            
            // Índices para búsquedas
            $table->index('is_active');
            $table->index('order');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categories');
    }
};
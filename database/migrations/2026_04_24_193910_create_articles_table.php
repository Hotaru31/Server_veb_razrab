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
        Schema::create('articles', function (Blueprint $table) {
            $table->id();

            // Название статьи
            $table->string('title');

            // Превью картинка (может быть пустой)
            $table->string('preview_image')->nullable();

            // Краткое описание
            $table->text('short_description')->nullable();

            // Полное описание
            $table->text('description');

            // Дата
            $table->date('date');

            // created_at и updated_at
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('articles');
    }
};
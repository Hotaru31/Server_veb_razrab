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
        Schema::table('users', function (Blueprint $table) {

            // Добавляем поле role_id и связываем с таблицей roles
            $table->foreignId('role_id')
                  ->nullable()
                  ->constrained('roles')
                  ->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {

            //удаление внешнего ключа и поля
            $table->dropConstrainedForeignId('role_id');
        });
    }
};
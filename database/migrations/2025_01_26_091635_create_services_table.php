<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServicesTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('services', function (Blueprint $table) {
            $table->id();  // Автоматическое создание id
            $table->string('name');  // Название услуги
            $table->text('description')->nullable();  // Описание услуги (необязательное)
            $table->decimal('price', 8, 2)->nullable()->change(); // Убедитесь, что поле может быть NULL

            $table->timestamps();  // created_at, updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('services');
    }
};

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdatePriceColumnInServicesTable extends Migration
{
    public function up(): void
    {
        Schema::table('services', function (Blueprint $table) {
            $table->decimal('price', '8', '2')->nullable()->change(); // Изменяем поле price на nullable
        });
    }

    public function down(): void
    {
        Schema::table('services', function (Blueprint $table) {
            $table->decimal('price', '8', '2')->nullable(false)->change(); // Возвращаем поле price к обязательному
        });
    }
}

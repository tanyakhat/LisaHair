<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id();  // Автоматическое создание id
            $table->string('name');  // Имя сотрудника
            $table->string('employee_position')->nullable();  // Должность сотрудника
            $table->integer('reviews_count')->default(0);  // Количество отзывов (по умолчанию 0)
            $table->timestamps();  // created_at, updated_at
        });;
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};

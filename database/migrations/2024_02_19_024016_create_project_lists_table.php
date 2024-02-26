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
        Schema::create('project_lists', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('manager_id');
            $table->foreign('manager_id')->references('id')->on('users');
            $table->string('project_name');
            $table->string('project_type');
            $table->string('category');
            $table->string('category_type');
            $table->string('total_budget');
            $table->unsignedBigInteger('project_owner');
            $table->foreign('project_owner')->references('id')->on('users');
            $table->longText('description');
            $table->longText('project_location_text');
            $table->longText('project_location_codes');
            $table->integer('status')->nullable()->default('0');
            $table->date('start_date');
            $table->date('end_date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('project_lists');
    }
};

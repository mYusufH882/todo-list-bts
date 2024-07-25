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
        Schema::create('item_todo_checklist', function (Blueprint $table) {
            $table->string('id', 36)->primary();
            $table->string('checklist_id', 36);
            $table->string('title');
            $table->string('status')->nullable();
            $table->timestamps();
            $table->foreign('checklist_id')->references('id')->on('checklist')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('item_todo_checklist');
    }
};

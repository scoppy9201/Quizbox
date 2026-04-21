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
        Schema::create('shows', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->foreignId('movie_id')->constrained()->onDelete('cascade');
            $table->string('location')->nullable();
            $table->string('city');
            $table->date('show_date');
            $table->time('show_time');

            $table->decimal('price_silver', 8, 2)->default(0);
            $table->decimal('price_gold', 8, 2)->default(0);
            $table->decimal('price_platinum', 8, 2)->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shows');
    }
};

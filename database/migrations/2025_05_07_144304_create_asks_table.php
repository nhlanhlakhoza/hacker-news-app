<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void {
        Schema::create('asks', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('hn_id')->unique();  // Hacker News ID
            $table->string('by')->nullable();       // Author
            $table->string('title')->nullable();    // Ask title
            $table->text('text')->nullable();       // Ask body text
            $table->integer('score')->nullable();   // Points
            $table->integer('time')->nullable();    // Unix time
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('asks');
    }
};

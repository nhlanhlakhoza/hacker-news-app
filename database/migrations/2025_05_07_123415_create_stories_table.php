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
    public function up()
    {
        Schema::create('stories', function (Blueprint $table) {
            $table->id(); // auto-increment
            $table->bigInteger('hn_id')->unique(); // Hacker News item ID
            $table->string('by'); // author
            $table->string('title');
            $table->string('type');
            $table->text('url')->nullable();
            $table->integer('score')->nullable();
            $table->integer('descendants')->nullable();
            $table->json('kids')->nullable(); // array 
            $table->timestamp('time')->nullable(); // post time
            $table->timestamps();
        
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('stories');
    }
};

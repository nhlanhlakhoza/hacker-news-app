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
        Schema::create('comments', function (Blueprint $table) {
        $table->id();
        $table->bigInteger('hn_id')->unique(); // Hacker News comment ID
        $table->string('by')->nullable(); // commenter
        $table->text('text')->nullable(); // comment text
        $table->bigInteger('parent'); // ID of parent story or comment
        $table->json('kids')->nullable(); // sub-comments
        $table->timestamp('time')->nullable(); // comment time
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
        Schema::dropIfExists('comments');
    }
};

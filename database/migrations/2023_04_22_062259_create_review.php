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
        Schema::create('review', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('content')->nullable();

            $table->unsignedBigInteger('from_user_id')->nullable();
            $table->unsignedBigInteger('to_user_id')->nullable();

            $table->timestamps();
            $table->softDeletes();

            $table->foreign('from_user_id')->references('id')->on('user')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('review');
    }
};

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
            $table->string('image')->nullable();

            $table->unsignedBigInteger('form_user_id')->nullable();
            $table->unsignedBigInteger('to_type_id')->nullable();

            $table->timestamps();
            $table->softDeletes();

            $table->foreign('form_user_id')->references('id')->on('user')->onDelete('cascade');
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

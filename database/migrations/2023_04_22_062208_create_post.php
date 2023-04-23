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
        Schema::create('post', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('title')->nullable();
            $table->text('requirements')->nullable();
            $table->text('description')->nullable();
            $table->text('benefit')->nullable();
            $table->integer('quantity')->nullable();
            $table->text('position')->nullable();
            $table->text('workplace')->nullable();
            $table->text('level')->nullable();
            $table->text('major')->nullable();
            $table->integer('status')->nullable()->default(0);

            $table->unsignedBigInteger('approved_user_id')->nullable();
            $table->unsignedBigInteger('skill_id')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();

            $table->timestamps();
            $table->softDeletes();

            $table->foreign('skill_id')->references('id')->on('skill')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('user')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('post');
    }
};
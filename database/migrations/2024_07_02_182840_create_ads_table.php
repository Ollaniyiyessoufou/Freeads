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
        Schema::create('ads', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->string('photo');
            $table->integer('price');
            $table->string('location',255);
            $table->unsignedBigInteger('category_id')->default(1);

            $table->unsignedBigInteger('user_id');
            
            $table->timestamps();

            $table->foreign('category_id')->references('id')->on('categories')
                    ->onUpdate('cascade')
                    ->onDelete('cascade');

            $table->foreign('user_id')->references('id')->on('users')
                    ->onUpdate('cascade')
                    ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ads');
    }
};

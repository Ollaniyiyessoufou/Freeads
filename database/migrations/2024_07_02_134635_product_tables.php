<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void{
    Schema::create('product', function (Blueprint $table) {
        $table->id();
        $table->string("name");
        $table->string("categorie");
        $table->integer("prix");
        $table->unsignedTinyInteger('attempts');
   
    });
    
    }

    public function down():void {
        Schema::dropIfExists("product");
    }
};
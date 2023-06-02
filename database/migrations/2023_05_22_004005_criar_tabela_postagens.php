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
        Schema::create('postagems', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            // $table->string('name_id')->nullable();
            // $table->text('image_id')->nullable();
            // $table->Integer('level_id');
            $table->string('texto')->nullable();
            $table->string('imagem')->nullable();
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('postagems');
    }
};

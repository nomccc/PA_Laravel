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
        Schema::create('menu', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('admin_id');
            $table->string('nama');
            $table->integer('harga');
            $table->unsignedBigInteger('tempat_id');
            $table->timestamps();

            $table->foreign('admin_id')-> references('id')->on('users')->onDelete('cascade');
            $table->foreign('tempat_id')-> references('id')->on('tempat')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('menu');
    }
};

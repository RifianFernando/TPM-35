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
        Schema::create('book', function (Blueprint $table) {
            // ini penting buat bikin primary key
            $table->id();
            $table->string('book_name');
            // foreign key dari authors
            $table->foreignId('author_id')->constrained();
            $table->string('book_image_path');

            // function built in laravel untuk waktu pembuatan database
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};

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
        Schema::create('bookinfos', function (Blueprint $table) {
            $table->id();
            $table->string('book_name');
            $table->string('author');
            $table->enum('status', ['Available', 'Checked Out', 'Reserved'])->default('Available');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookinfos');
    }
};

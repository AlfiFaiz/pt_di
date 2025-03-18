<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('forms', function (Blueprint $table) {
            $table->id();
            $table->string('nomor')->unique();
            $table->string('judul');
            $table->date('date_issued');
            $table->string('org');
            $table->integer('rev');
            $table->integer('amend')->nullable();
            $table->string('affected_function');
            $table->string('file_path'); // Menyimpan path file
            $table->timestamps();
        });
    }
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('forms');
    }
};

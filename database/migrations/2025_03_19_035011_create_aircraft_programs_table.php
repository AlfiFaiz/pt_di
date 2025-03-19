<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up() {
        Schema::create('aircraft_programs', function (Blueprint $table) {
            $table->id();
            $table->string('program'); // Nama program
            $table->string('aircraft_type'); // Tipe Pesawat
            $table->string('registration'); // Registrasi
            $table->string('customer'); // Nama Customer
            $table->string('image'); // Gambar (path)
            $table->integer('progress'); // Progress dalam persen
            $table->timestamps();
        });
    }

    public function down() {
        Schema::dropIfExists('aircraft_programs');
    }
};

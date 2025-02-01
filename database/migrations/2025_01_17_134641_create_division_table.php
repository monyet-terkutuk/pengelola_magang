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
        // Membuat tabel division
        Schema::create('divisions', function (Blueprint $table) {
            $table->id();                          // Kolom id untuk tabel divisions
            $table->string('name');                 // Nama divisi
            $table->text('description')->nullable(); // Deskripsi divisi (opsional)
            $table->timestamps();                  // Kolom created_at dan updated_at
        });

        // Menambahkan kolom division_id pada tabel internships
        Schema::table('internships', function (Blueprint $table) {
            $table->foreignId('division_id')       // Kolom division_id yang merujuk ke tabel divisions
                ->constrained('divisions')         // Menentukan relasi dengan tabel divisions
                ->onDelete('cascade');            // Jika divisi dihapus, maka semua data magang yang terkait akan ikut dihapus
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Menghapus kolom foreign key pada tabel internships
        Schema::table('internships', function (Blueprint $table) {
            $table->dropForeign(['division_id']); // Menghapus relasi foreign key
            $table->dropColumn('division_id');   // Menghapus kolom division_id
        });

        // Menghapus tabel divisions
        Schema::dropIfExists('divisions');
    }
};

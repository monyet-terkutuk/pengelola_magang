<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInternshipsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('internships', function (Blueprint $table) {
            $table->id();
            $table->date('letter_date');
            $table->string('institution_name');
            $table->string('major');
            $table->integer('participant_count');
            $table->foreignId('division_id')->nullable()->constrained('divisions')->onDelete('cascade');
            $table->date('start_date')->nullable();  // Kolom start_date untuk tanggal mulai
            $table->date('end_date')->nullable();    // Kolom end_date untuk tanggal selesai
            $table->boolean('request_letter')->default(false);
            $table->boolean('acceptance_letter')->default(false);
            $table->boolean('kesbangpol_letter')->default(false);
            $table->text('documentation')->nullable();
            $table->string('contact_person');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('internships');
    }
}


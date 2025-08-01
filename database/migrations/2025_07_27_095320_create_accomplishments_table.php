<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccomplishmentsTable extends Migration
{
    public function up(): void
    {
        Schema::create('accomplishments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('member_id'); // relasi ke anggota
            $table->integer('year');
            $table->string('month');
            $table->integer('day');
            $table->string('event_name');
            $table->string('level'); // tingkat (misal: Nasional, Provinsi)
            $table->string('class'); // kelas pertandingan
            $table->string('organizer');
            $table->string('athlete'); // bisa nama atlet/peserta
            $table->string('rank'); // peringkat
            $table->json('awards')->nullable(); // {"type": "Medal", "id": "XX123"}
            $table->string('condition')->nullable(); // kondisi (misal: cedera, sehat)
            $table->text('notes')->nullable(); // keterangan
            $table->timestamps();

            // Foreign key
            $table->foreign('member_id')->references('id')->on('members')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('accomplishments');
    }
}
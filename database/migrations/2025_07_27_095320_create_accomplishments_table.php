<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccomplishmentsTable extends Migration
{
    public function up(): void
    {
        Schema::create('accomplishments', function (Blueprint $table) {
            //DATABASE TROPHY
            $table->id();
            $table->unsignedBigInteger('member_id'); // relasi ke anggota
            $table->date('start_date');
            $table->date('end_date');
            $table->string('category');
            $table->string('event_name');
            $table->string('type');
            $table->string('level'); // tingkat (misal: Nasional, Provinsi)
            $table->string('organizer');
            $table->string('barcode_trophy'); 
            $table->string('street')->nullable(); 
            $table->string('province')->nullable(); 
            $table->string('zip_code')->nullable(); 
            $table->string('country')->nullable(); 
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
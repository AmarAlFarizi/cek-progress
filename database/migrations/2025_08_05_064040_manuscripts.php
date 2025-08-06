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
        Schema::create('manuscripts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('author_id')->constrained()->onDelete('cascade');
            $table->foreignId('package_id')->nullable()->constrained('publishing_packages')->onDelete('set null');
            $table->string('title');
            $table->boolean('status_administrasi')->default(false);
            $table->enum('status_layout', ['Belum', 'Antri', 'Proses', 'Selesai'])->default('Belum');
            $table->enum('status_desain_cover', ['Belum', 'Antri', 'Proses', 'Selesai'])->default('Belum');
            $table->string('file_naskah')->nullable();
            $table->string('file_cover')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('manuscripts');
    }
};

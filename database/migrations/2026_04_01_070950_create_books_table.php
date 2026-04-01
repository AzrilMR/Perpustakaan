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
    Schema::create('books', function (Blueprint $table) {
        $table->id();

        $table->string('judul');
        $table->string('penulis');
        $table->string('penerbit')->nullable();
        $table->year('tahun')->nullable();
        $table->integer('stok')->default(0);

        // RELASI KE KATEGORI
        $table->foreignId('category_id')
              ->nullable()
              ->constrained()
              ->onDelete('set null');

        $table->timestamps();
    });
}
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};

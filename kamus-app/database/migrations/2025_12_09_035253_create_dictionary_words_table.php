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
    Schema::create('dictionary', function (Blueprint $table) {
        $table->id();
        $table->string('source_language'); // contoh: id, en, nl
        $table->string('target_language'); // contoh: en, id, nl
        $table->string('word');            // kata asli
        $table->string('translation');     // terjemahan
        $table->string('pronunciation')->nullable(); // contoh: /wʌt/
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dictionary_words');
    }
};

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
        Schema::create('publications', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('type');
            $table->string('genres');
            $table->decimal('price', 8, 2);
            $table->integer('da');
            $table->string('tat');
            $table->string('region');
            $table->enum('sponsored', ['Yes', 'No']);
            $table->enum('indexed', ['Yes', 'No']);
            $table->enum('has_image', ['Yes', 'No']);
            $table->enum('do_follow', ['Yes', 'No']);
            $table->string('image');
            $table->string('example');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('publications');
    }
};

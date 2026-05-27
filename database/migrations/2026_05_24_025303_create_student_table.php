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
        Schema::create('students', function (Blueprint $table) {

            $table->id();

            $table->string('stuno');
            $table->string('khmername');
            $table->string('englishname');

            $table->string('gender');

            $table->date('birthdate');

            $table->string('nation')->nullable();
            $table->string('religion')->nullable();

            $table->string('room')->nullable();
            $table->string('session')->nullable();

            $table->string('subject')->nullable();
            $table->string('teacher')->nullable();

            $table->text('history')->nullable();

            $table->string('phone')->nullable();

            $table->text('address')->nullable();

            $table->string('province')->nullable();
            $table->string('district')->nullable();
            $table->string('commune')->nullable();
            $table->string('village')->nullable();

            $table->string('fathername')->nullable();
            $table->string('mothername')->nullable();

            $table->string('healthy')->nullable();

            $table->string('marital_status')->nullable();

            $table->string('photo')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('student');
    }
};

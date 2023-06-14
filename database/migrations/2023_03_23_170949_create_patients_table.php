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
        Schema::create('patients', function (Blueprint $table) {
            $table->id();
            $table->string("fname");
            $table->string("name");
            $table->string("phone");
            $table->string("cin")->nullable();
            $table->char("gender",1)->default('m');
            $table->date("birth_date")->nullable();
            $table->boolean("iswaiting")->default(0);
            $table->foreignId('assurance_id')->constrained();
            $table->string('slug')->unique();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('patients');
    }
};

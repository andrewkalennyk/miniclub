<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddLocalClubs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('local_club', function (Blueprint $table) {
            $table->id();
            $table->foreignId('city_id')->constrained('city');
            $table->string('picture')->nullable();
            $table->string('url')->nullable();
            $table->string('responsible')->nullable();
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
        Schema::dropIfExists('local_club');
    }
}

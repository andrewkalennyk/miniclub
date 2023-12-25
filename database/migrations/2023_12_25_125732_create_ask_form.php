<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAskForm extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ask_form', function (Blueprint $table) {
            $table->id();
            $table->text('proposition');
            $table->tinyInteger('is_anonymously')->nullable();
            $table->string('social_name')->nullable();
            $table->tinyInteger('is_answered')->default(0);
            $table->text('answer')->nullable();
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
        Schema::dropIfExists('ask_form');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSecretSantaApplyForm extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('secret_santa_apply_form', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('social_name')->nullable();
            $table->string('car_number')->nullable();
            $table->string('car_details')->nullable();
            $table->string('instagram')->nullable();
            $table->string('email')->nullable();
            $table->string('np_address')->nullable();
            $table->string('about_description')->nullable();
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
        Schema::dropIfExists('secret_santa_apply_form');
    }
}

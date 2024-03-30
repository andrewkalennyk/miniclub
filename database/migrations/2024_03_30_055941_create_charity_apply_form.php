<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCharityApplyForm extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('charity_apply_form', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('whom');
            $table->string('what');
            $table->string('for_what');
            $table->text('short_description');
            $table->string('author');
            $table->string('url');
            $table->tinyInteger('is_active')->default(1);
            $table->tinyInteger('is_published')->default(0);
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
        Schema::dropIfExists('charity_apply_form');
    }
}

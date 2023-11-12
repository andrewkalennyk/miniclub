<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShareServiceApply extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('share_service_apply', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('url');
            $table->text('google_map');
            $table->string('service_type');
            $table->string('city_id');
            $table->string('social_name');
            $table->string('rating');
            $table->string('message');
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
        Schema::dropIfExists('share_service_apply');
    }
}

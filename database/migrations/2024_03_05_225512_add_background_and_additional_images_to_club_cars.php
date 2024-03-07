<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddBackgroundAndAdditionalImagesToClubCars extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('club_cars', function (Blueprint $table) {
            $table->string('background_image')->after('image')->nullable();
            $table->text('additional_images')->after('background_image')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('club_cars', function (Blueprint $table) {
            $table->dropColumn('background_image');
            $table->dropColumn('additional_images');
        });
    }
}

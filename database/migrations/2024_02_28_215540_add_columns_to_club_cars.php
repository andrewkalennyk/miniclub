<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddColumnsToClubCars extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('club_cars', function (Blueprint $table) {
            $table->bigInteger('car_model_id')->nullable()->after('description_en');
            $table->bigInteger('user_id')->nullable()->after('car_model_id');
            $table->year('year')->nullable()->after('user_id');
            $table->string('color')->nullable()->after('year');
            $table->string('petrol')->nullable()->after('color');
            $table->string('transmission')->nullable()->after('petrol');
            $table->string('image')->nullable()->after('transmission');
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
            $table->dropColumn(['car_model_id','user_id','year', 'color','petrol', 'transmission', 'image']);
        });
    }
}

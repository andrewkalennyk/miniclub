<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddIsWithPets extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('secret_santa_apply_form', function (Blueprint $table) {
            $table->tinyInteger('is_with_pet')->after('about_description_details')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('secret_santa_apply_form', function (Blueprint $table) {
            $table->dropColumn('is_with_pet');
        });
    }
}

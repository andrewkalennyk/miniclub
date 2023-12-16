<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddToSecretSantaApplyForm extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('secret_santa_apply_form', function (Blueprint $table) {
            $table->text('about_description_details')->after('about_description')->nullable();
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
            $table->dropColumn('about_description_details');
        });
    }
}

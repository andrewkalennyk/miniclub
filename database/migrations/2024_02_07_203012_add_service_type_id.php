<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddServiceTypeId extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('share_service_apply', function (Blueprint $table) {
            $table->bigInteger('service_type_id')->after('service_type')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('share_service_apply', function (Blueprint $table) {
            $table->dropColumn('service_type_id');
        });
    }
}

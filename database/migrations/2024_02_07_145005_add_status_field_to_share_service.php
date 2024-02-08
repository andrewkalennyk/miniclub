<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddStatusFieldToShareService extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('share_service_apply', function (Blueprint $table) {
            $table->string('status')->after('message')->default('new');
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
            $table->dropColumn('status');
        });
    }
}

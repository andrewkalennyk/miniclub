<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldsToService extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('services', function (Blueprint $table) {
            $table->string('address_en')->nullable()->after('address');
            $table->text('google_url')->nullable()->after('site_url');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('services', function (Blueprint $table) {
            $table->dropColumn('address_en');
            $table->dropColumn('google_url');
        });
    }
}

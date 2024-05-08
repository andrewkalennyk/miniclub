<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSeoFieldsToTbTree extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tb_tree', function (Blueprint $table) {
            $table->string('seo_title_en')->nullable()->after('seo_title');
            $table->string('seo_description_en')->nullable()->after('seo_description');
            //
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tb_tree', function (Blueprint $table) {
            $table->dropColumn('seo_title_en');
            $table->dropColumn('seo_description_en');
        });
    }
}

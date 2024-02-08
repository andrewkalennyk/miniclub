<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class RemoveServiceTypeFromShareServiceApply extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('share_service_apply', function (Blueprint $table) {
            $table->dropColumn('service_type');
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
            $table->string('service_type')->nullable(); // Восстановите столбец со всеми предыдущими настройками
        });
    }
}

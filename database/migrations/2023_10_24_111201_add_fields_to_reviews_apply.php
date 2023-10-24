<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldsToReviewsApply extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('reviews_apply', function (Blueprint $table) {
            $table->string('status')->after('message')->default('new');
            $table->foreignId('review_user_id')->nullable()->constrained('review_users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('reviews_apply', function (Blueprint $table) {
            $table->dropColumn('status');
            $table->dropForeign('review_user_id');
        });
    }
}

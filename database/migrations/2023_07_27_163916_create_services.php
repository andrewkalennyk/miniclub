<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServices extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->foreignId('city_id')->nullable()->constrained('city');
            $table->foreignId('service_type_id')->nullable()->constrained('service_types');
            $table->string('title');
            $table->string('title_en');
            $table->text('logo')->nullable();
            $table->string('number')->nullable();
            $table->string('site_url')->nullable();
            $table->string('contact_person')->nullable();
            $table->string('address')->nullable();
            $table->string('slug')->nullable();
            $table->tinyInteger('is_active');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('services');
    }
}

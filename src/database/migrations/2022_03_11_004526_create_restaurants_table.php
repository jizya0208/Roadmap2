<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {   if (!Schema::hasTable('restaurants')) {
        Schema::create('restaurants', function (Blueprint $table) {
            $table->id();
            $table->string('name', 50)->unique();
            $table->string('image_id');
            $table->text('description')->nullable();
            $table->string('address')->nullable();
            $table->string('email');
            $table->string('password');
            $table->timestamps();
        });
    }
}

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('restaurants');
    }
};

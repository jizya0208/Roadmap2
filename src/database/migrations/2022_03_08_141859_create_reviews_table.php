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
    {
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            $table->foreignId('restaurant_id')->constrained();
            $table->double('star');
            $table->text('comment');
            $table->string('name');
            $table->enum('gender', ['男性', '女性', 'その他','解答しない']);
            $table->enum('age', ['10代以下', '20代', '30代','40代','50代','60代以上']);
            $table->string('email');
            $table->boolean('is_receivable');
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
        Schema::dropIfExists('reviews');
    }
};

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePropertyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('properties', function (Blueprint $table) {
            $table->increments('id');
            $table->string('description');
            $table->string('address');
            $table->integer('user_id')->unsigned()->index();
            $table->string('post_code');
            $table->decimal('interest_rate');
            $table->decimal('principal_amount', 30,2);
            $table->decimal('payment', 30,2);
            $table->timestamp('payment_date')->nullable();
            $table->timestamp('purchased_date')->nullable();
            $table->timestamp('renew_date')->nullable();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('properties');
    }
}

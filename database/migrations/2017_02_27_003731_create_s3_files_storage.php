<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateS3FilesStorage extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('S3_files_storage', function (Blueprint $table) {
            $table->increments('id');
            $table->string('storable_type');
            $table->string('file_name');
            $table->string('file_hash');
            $table->string('media_type');
            $table->integer('property_id')->unsigned()->index();
            $table->integer('storable_id')->unsigned()->index();
            $table->integer('user_id')->unsigned()->index();
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
        Schema::dropIfExists('S3_files_storage');
    }
}

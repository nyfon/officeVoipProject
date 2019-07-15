<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVoiceFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('voice_files', function (Blueprint $table) {
            $table->increments('id');
            $table->string('file_name', 250);
            $table->tinyInteger('is_active')->comment('1:inactive 2:active');
            $table->text('location');

            $table->tinyInteger('is_personal')->comment('1:no 2:yes');
            $table->tinyInteger('is_personal_accepted')->comment('1:no 2:yes');

            $table->unsignedInteger('verifier_id')->nullable()->default(null);
            $table->unsignedInteger('uploader_id')->nullable()->default(null);

            $table->timestamp('upload_time')->nullable()->default(null);
            $table->timestamp('verify_time')->nullable()->default(null);

            $table->unsignedInteger('voice_categories_id');
            $table->unsignedInteger('acceptance_process_id')->nullable();

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
        Schema::dropIfExists('voice_files');
    }
}

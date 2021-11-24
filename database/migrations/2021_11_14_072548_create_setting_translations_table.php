<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('setting_translations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('setting_id');
            $table->string('name')->nullable();
            $table->string('address')->nullable();
            $table->string('working_times')->nullable();
            $table->string('copyrights')->nullable();
            $table->text('description')->nullable();
            
            $table->string('locale')->index();
            $table->unique(['setting_id','locale']);
            $table->foreign('setting_id')->references('id')->on('settings')->delete('cascade');
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
        Schema::dropIfExists('setting_translations');
    }
}

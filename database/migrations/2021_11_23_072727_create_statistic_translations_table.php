<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStatisticTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('statistic_translations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('statistic_id');
            $table->string('name')->nullable();
            $table->string('description')->nullable();
            $table->string('locale')->index();
            $table->unique(['statistic_id','locale']);
            $table->foreign('statistic_id')->references('id')->on('statistics')->delete('cascade');
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
        Schema::dropIfExists('statistic_translations');
    }
}

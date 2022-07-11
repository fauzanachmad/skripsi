<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePredictHistoriesTable extends Migration
{
    public function up()
    {
        Schema::create('predict_histories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title')->nullable();
            $table->string('view')->nullable();
            $table->longText('user_agent')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}

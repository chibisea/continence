<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDiaryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('diary', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('date');//日付の保存カラム
            $table->string('time');//時間の保存カラム
            $table->string('bs');//BSの保存カラム
            $table->string('size');//便の大きさの保存カラム
            $table->string('smell');//便臭の保存カラム
            $table->string('color');//便の色の保存カラム
            $table->string('medicine');//下剤名の保存カラム
            $table->string('amount');//下剤量の保存カラム
            $table->string('water');//水分量の保存カラム
            $table->string('note');//備考の保存カラム
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
        Schema::dropIfExists('diary');
    }
}

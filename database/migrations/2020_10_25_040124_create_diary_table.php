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
        Schema::create('diaries', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('profile_id');
            $table->date('date');//日付の保存カラム
            $table->string('time')->nullable();//時間の保存カラム
            $table->string('bs')->nullable();//BSの保存カラム
            $table->string('size')->nullable();//便の大きさの保存カラム
            $table->string('smell')->nullable();//便臭の保存カラム
            $table->string('color')->nullable();//便の色の保存カラム
            $table->string('medicine')->nullable();//下剤名の保存カラム
            $table->string('amount')->nullable();//下剤量の保存カラム
            $table->string('water');//水分量の保存カラム
            $table->string('note')->nullable();//備考の保存カラム
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
        Schema::dropIfExists('diaries');
    }
}

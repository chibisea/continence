<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfileTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');//患者名の保存カラム
            $table->string('gender');//性別の保存カラム
            $table->string('age');//年齢の保存カラム
            $table->string('ward');//病棟名の保存カラム
            $table->string('disease');//基礎疾患名の保存カラム
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
        Schema::dropIfExists('profiles');
    }
}

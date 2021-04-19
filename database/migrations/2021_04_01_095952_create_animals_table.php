<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnimalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('animals', function (Blueprint $table) {
            $table->id();
            // $table->bigInteger('userid')->unsigned();
            $table->bigInteger('adoptionid')->unsigned()->nullable();
            $table->string('name', 20);
            $table->date('date_of_birth');
            $table->string('description', 256)->nullable();
            $table->string('image1')->nullable();
            $table->string('image2')->nullable();
            $table->string('image3')->nullable();
            $table->string('image4')->nullable();
            $table->enum('Available',['yes', 'no'])->default('no');
            $table->enum('type',['cat', 'dog', 'fish', 'rabbit','bird', 'other'])->default('other');
            $table->foreign('adoptionid')->references('id')->on('users');
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
        Schema::dropIfExists('animals');
    }
}

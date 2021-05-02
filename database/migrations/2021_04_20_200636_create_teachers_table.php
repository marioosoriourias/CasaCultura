<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeachersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teachers', function (Blueprint $table) {
            $table->id();

            $table->string('name');
            $table->integer('age');
            $table->string('gender');
            $table->string('phone')->nullable();
            $table->text('address')->nullable();
            $table->string('email')->nullable();
            
            $table->unsignedBigInteger('teacher_type_id');
            $table->foreign('teacher_type_id')->references('id')->on('teacher_types')->onDelete('cascade');

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
        Schema::dropIfExists('teachers');
    }
}

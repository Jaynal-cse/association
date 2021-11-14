<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateScholarship1sTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('scholarship1s', function (Blueprint $table) {
            $table->id();
			$table->string('scholarship_name');
			$table->string('std_name');
			$table->string('father_name');
			$table->string('mother_name');
			$table->date('DOB');
			$table->text('present_address');
			$table->integer('phone');
			$table->string('email');
			$table->string('exam_name');
			$table->string('group_name');
			$table->string('board_name');
			$table->integer('passing_year');
			$table->integer('std_roll');
			$table->integer('std_reg');
			$table->float('std_result');
			$table->string('image');			
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
        Schema::dropIfExists('scholarship1s');
    }
}

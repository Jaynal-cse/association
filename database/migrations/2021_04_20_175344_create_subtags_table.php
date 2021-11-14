<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubtagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subtags', function (Blueprint $table) {
            $table->id();
			$table->string('name');
			$table->string('slug');
			$table->integer('tag_id');
			$table->string('description')->default('0');
			$table->string('image')->default('default.png');
			$table->integer('priority')->default(0);
			$table->boolean('status')->default(0);
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
        Schema::dropIfExists('subtags');
    }
}

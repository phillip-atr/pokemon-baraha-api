<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrainersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trainers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained();
            $table->foreignId('class_id')->constrained();
            $table->foreignId('type_id')->constrained();
            $table->foreignId('group_id')->constrained();
            $table->string('name');
            $table->enum('gender', ['MALE', 'FEMALE']);
            $table->string('avatar')->nullable();
            $table->integer('max_catch')->default(6);
            $table->time('reset_catch')->nullable();
            $table->timestamps();

            $table->index([
                'id',
                'user_id',
                'class_id',
                'type_id',
                'group_id'
            ]);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('trainers');
    }
}

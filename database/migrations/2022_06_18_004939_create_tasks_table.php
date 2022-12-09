<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('creator_id')->nullable();
            $table->string('title')->nullable();
            $table->text('description')->nullable();
            $table->foreignId('type_id')->nullable()->constrained('task_types')->onUpdate('cascade')->onDelete('set null');
            // $table->string('teams')->nullable();
            $table->unsignedBigInteger('worker_id')->nullable();
            $table->tinyInteger('lock')->default(1)->comment('0=>lock,1=>open');
            $table->tinyInteger('priority')->default(0)->comment('0=>low,1=>medium 2=>high');
            $table->tinyInteger('status')->default(0)->comment('0=>no activity,1=>working 2=>complete');
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
        Schema::dropIfExists('tasks');
    }
}

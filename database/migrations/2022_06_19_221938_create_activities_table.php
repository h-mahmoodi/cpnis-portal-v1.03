<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActivitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('activities', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('sender_id')->nullable();
            $table->unsignedBigInteger('worker_id')->nullable();
            $table->foreignId('task_id')->constrained('tasks')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('reply_id')->nullable()->constrained('activities')->cascadeOnUpdate()->onDelete('set null');
            $table->text('description')->nullable();
            $table->unsignedTinyInteger('status')->nullable();
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
        Schema::dropIfExists('activities');
    }
}

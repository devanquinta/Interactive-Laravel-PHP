<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInteractionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!(Schema::hasTable('interactions'))) {
            Schema::create('interactions', function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('topic_id');
                $table->unsignedBigInteger('user_id');
                $table->text('interaction');
                $table->timestamps();

                #Apagando um user_id apaga também todos usuários
                $table->foreign('topic_id')
            ->references('id')
            ->on('topics')
            ->onDelete('cascade');

                #Apagando um thread_id apaga também todos as threads
                $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('interactions');
    }
}

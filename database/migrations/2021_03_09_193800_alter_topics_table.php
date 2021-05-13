<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTopicsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!(Schema::hasColumn('topics', 'channel_id'))) {
            Schema::table('topics', function (Blueprint $table) {
                $table->unsignedBigInteger('channel_id')->after('id');
                $table->foreign('channel_id')
                ->references('id')
                ->on('channels')
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
        Schema::table('topics', function (Blueprint $table) {

            // $table->Schema::disableForeignKeyConstraints();
            // $table->Schema::dropIfExists('topics');
        });

    }
}

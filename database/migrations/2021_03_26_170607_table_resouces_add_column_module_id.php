<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TableResoucesAddColumnModuleId extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!(Schema::hasColumn('resources', 'module_id'))) {
            Schema::table('resources', function (Blueprint $table) {
                $table->unsignedBigInteger('module_id')->after('id')->nullable();
                $table->foreign('module_id')->references('id')->on('resources')->onDelete('cascade');
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
       
        Schema::table('resources', function (Blueprint $table) {
            // $table->dropForeign('resources_module_id_foreign')->references('module_id')->on('resources');
            // $table->dropColumn('module_id');
            
        });
    }
}

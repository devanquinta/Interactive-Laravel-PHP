<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateModuleRoleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!(Schema::hasTable('module_role'))) {
        Schema::create('module_role', function (Blueprint $table) {
           $table->unsignedBigInteger('role_id');
           $table->unsignedBigInteger('module_id');
           $table->foreign('role_id')->references('id')->on('roles')->onDelete('cascade');
           $table->foreign('module_id')->nullable()->references('id')->on('modules')->onDelete('cascade');

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
        
        Schema::dropIfExists('module_role');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateTasksModels6 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
//        Schema::table('tasks_models', function (Blueprint $table) {
//            $table->dropForeign('tasks_models_users_id_foreign');
//            $table->dropColumn('users_id');
//        });
//
//        Schema::table('tasks_models', function (Blueprint $table) {
//            $table->unsignedInteger('user_id')->nullable();
//            $table->foreign('user_id')->references('users')->on('id');
//        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}

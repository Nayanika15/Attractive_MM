<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePermissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('permissions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('role_id')->unique();
            $table->enum('create_action', [0, 1])
                ->default(0)
                ->comments('1 - permission to create, 0- no permission');
            $table->enum('update_action', [0, 1])
                ->default(0)
                ->comments('1 - permission to update, 0- no permission');
            $table->enum('delete_action', [0, 1])
                ->default(0)
                ->comments('1- permission to delete, 0- no permission');
            //defining foreign key
            $table->foreign('role_id')
                ->references('id')
                ->on('roles')
                ->onDelete('cascade');
                
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
        Schema::dropIfExists('permissions');
    }
}

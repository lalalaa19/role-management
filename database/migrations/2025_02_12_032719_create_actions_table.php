<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('actions', function (Blueprint $table) {
            $table->bigIncrements('action_id');
            $table->string('action_name', 50);
            $table->string('action_status', 10);
            $table->string('role_role_id', 45);
            $table->timestamps();

            // Foreign Key ke role
            $table->foreign('role_role_id')->references('role_id')->on('roles')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('actions');
    }
};

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->string('user_id', 45)->primary();
            $table->string('user_name', 45)->nullable();
            $table->string('user_email', 45)->nullable()->unique();
            $table->string('user_password', 60)->nullable();
            $table->string('user_type', 45)->default('Customer');
            $table->string('user_status', 45)->nullable();
            $table->text('user_ava');
            $table->string('user_gender', 6);
            $table->string('user_lead', 50)->nullable();
            $table->string('role_role_id', 45)->default('RL005');
            $table->timestamps();
            $table->rememberToken();
        
            // Foreign Key ke role
            $table->foreign('role_role_id')->references('role_id')->on('roles')->onDelete('cascade')->onUpdate('cascade');
        
            // Index sesuai dengan query
            $table->index('role_role_id');
        });
    }

    public function down()
    {
        Schema::dropIfExists('users');
    }
};
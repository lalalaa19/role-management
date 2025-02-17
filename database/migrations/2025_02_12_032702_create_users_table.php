<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->string('user_id', 45)->primary();
            $table->string('user_nik', 16)->unique();
            $table->string('user_name', 45)->nullable();
            $table->string('user_email', 45)->nullable()->unique();
            $table->string('user_personal_email', 45);
            $table->string('user_password', 45)->nullable();
            $table->date('user_birthday')->nullable();
            $table->string('user_phone', 45)->nullable();
            $table->text('user_address')->nullable();
            $table->string('user_emergency_contact', 30)->nullable();
            $table->string('user_blood_type', 15)->nullable();
            $table->string('user_type', 45)->default('Customer');
            $table->string('user_status', 45)->nullable();
            $table->string('user_leave', 20)->default('1');
            $table->string('user_medical', 45);
            $table->string('user_grade_id', 45);
            $table->date('user_join_date')->nullable();
            $table->date('user_probation_end')->nullable();
            $table->date('user_contract_start')->nullable();
            $table->date('user_contract_end')->nullable();
            $table->date('user_permanent_date')->nullable();
            $table->date('user_resign_date')->nullable();
            $table->text('user_resign_detail');
            $table->text('user_work_experience');
            $table->text('user_ava');
            $table->string('user_gender', 6);
            $table->string('user_lead', 50)->nullable();
            $table->string('user_referral', 50)->nullable();
            $table->string('role_role_id', 45)->default('RL005');
            $table->string('user_passport', 100)->nullable();
            $table->date('user_passport_date')->nullable();
            $table->string('user_emergency_name', 50);
            $table->string('user_emergency_relationship', 50);
            $table->string('user_biotime_id', 50)->nullable();
            $table->string('user_employee_id', 50)->nullable();
            $table->string('user_bank_account', 50)->nullable();
            $table->timestamps();
            $table->rememberToken();
        
            // Foreign Key ke role
            $table->foreign('role_role_id')->references('role_id')->on('roles')->onDelete('cascade')->onUpdate('cascade');
        
            // Index sesuai dengan query yang kamu berikan
            $table->index('role_role_id');
            $table->index('user_grade_id');
            $table->index('user_status');
        });
        
    }

    public function down()
    {
        Schema::dropIfExists('users');
    }
};


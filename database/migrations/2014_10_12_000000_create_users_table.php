<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('username');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('lastName');
            $table->string('firstName');
            $table->string('titleName')->nullable();
            $table->string('countryCode')->nullable();
            $table->boolean('isAdmin');
            $table->string('profileImage')->nullable();
            $table->string('contactNumber')->nullable();
            $table->unsignedBigInteger('department_id')->unsigned()->nullable();
            $table->boolean('status');
            $table->boolean('isDelete');
            $table->string('type')->nullable();
            $table->rememberToken();

            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));

            $table->foreign('department_id')->references('id')->on('departments');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}

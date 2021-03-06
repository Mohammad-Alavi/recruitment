<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUsersTable extends Migration
{

    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');

            $table->string('name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('email')->unique()->nullable();
            $table->string('password')->nullable();
            $table->boolean('confirmed')->default(false);
            $table->string('gender')->nullable();
            $table->string('military_service_status')->nullable();
            $table->string('marital_status')->nullable();
            $table->string('last_educational_certificate')->nullable();
            $table->string('field_of_study')->nullable();
            $table->string('method_of_introduction')->nullable();
            $table->unsignedInteger('country_id');
            $table->string('national_code')->unique()->nullable();
            $table->string('foreign_national_code')->unique()->nullable();
            $table->string('birth')->nullable();
            $table->string('device')->nullable();
            $table->string('platform')->nullable();
            $table->boolean('is_client')->default(false);

            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::drop('users');
    }
}

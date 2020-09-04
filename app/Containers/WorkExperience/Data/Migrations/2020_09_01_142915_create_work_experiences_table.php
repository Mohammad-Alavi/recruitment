<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWorkExperiencesTable extends Migration
{
    public function up(): void
    {
        Schema::create('work_experiences', static function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->cascadeOnDelete();
            $table->string('work_place_name');
            $table->string('type_of_work');
            $table->integer('work_duration_year');
            $table->integer('work_duration_month');
            $table->integer('insurance_duration_year');
            $table->integer('insurance_duration_month');
            $table->string('activity_termination_reason');
            $table->text('consent_text')->nullable();
            $table->string('employer_name')->nullable();
            $table->string('employer_number')->nullable();
            $table->timestamps();
            //$table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('work_experiences');
    }
}

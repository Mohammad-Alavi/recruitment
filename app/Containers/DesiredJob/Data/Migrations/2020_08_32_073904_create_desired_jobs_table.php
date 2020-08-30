<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDesiredjobsTable extends Migration
{
    public function up(): void
    {
        Schema::create('desired_jobs', static function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->cascadeOnDelete();
            $table->unsignedInteger('activity_domain_id');
            $table->foreign('activity_domain_id')->references('id')->on('activity_domains')->cascadeOnDelete();
            $table->unsignedInteger('activity_domain_job_id');
            $table->foreign('activity_domain_job_id')->references('id')->on('activity_domain_jobs')->cascadeOnDelete();
            $table->date('ready_date');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('desired_jobs');
    }
}

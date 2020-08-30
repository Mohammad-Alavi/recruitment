<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActivityDomainJobsTable extends Migration
{
    public function up(): void
    {
        Schema::create('activity_domain_jobs', static function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('activity_domain_id');
            $table->foreign('activity_domain_id')->references('id')->on('activity_domains')->cascadeOnDelete();
            $table->string('name');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('activity_domain_jobs');
    }
}

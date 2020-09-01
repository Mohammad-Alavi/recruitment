<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWorkExperiencesTable extends Migration
{
    public function up(): void
    {
        Schema::create('work-experiences', static function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            //$table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('work-experiences');
    }
}

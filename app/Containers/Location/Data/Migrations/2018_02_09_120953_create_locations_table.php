<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLocationsTable extends Migration
{
    public function up(): void
    {
        Schema::create('locations', static function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('globalCode')->nullable();
            $table->integer('lft')->nullable()->default(null);
            $table->integer('rgt')->nullable()->default(null);
            $table->integer('lvl')->nullable()->default(null);
            $table->integer('parent')->nullable()->default(null);
            $table->tinyInteger('published')->default(null);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::drop('locations');
    }
}

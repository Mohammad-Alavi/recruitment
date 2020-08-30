<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActivityDomainsTable extends Migration
{
    public function up(): void
    {
        Schema::create('activity_domains', static function (Blueprint $table) {

            $table->increments('id');

            $table->timestamps();
            //$table->softDeletes();

        });
    }

    public function down(): void
    {
        Schema::dropIfExists('activity_domains');
    }
}

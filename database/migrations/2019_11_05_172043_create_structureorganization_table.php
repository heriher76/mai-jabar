<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStructureorganizationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('structure_organization', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable();
            $table->string('email')->nullable();
            $table->string('title')->nullable();
            $table->string('image')->nullable();
            $table->string('ttl')->nullable();
            $table->string('religion')->nullable();
            $table->longText('schools')->nullable();
            $table->longText('organizations')->nullable();
            $table->longText('jobs')->nullable();
            $table->longText('achievements')->nullable();
            $table->longText('description')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('structure_organization');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFormBuilderTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fb_forms', function (Blueprint $table) {
            $table->id();
            $table->string('title', 255);
            $table->text('description')->nullable();
            $table->text('form')->nullable();
            $table->boolean('in_database')->default(0);
            $table->boolean('by_mail')->default(0);
            $table->timestamps();
        });
        Schema::create('fb_entries', function (Blueprint $table) {
            $table->id();
            $table->string('title', 255);
            $table->text('description')->nullable();
            $table->text('form')->nullable();
            $table->boolean('in_database')->default(0);
            $table->boolean('by_mail')->default(0);
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
        Schema::dropIfExists('fb_forms');
        Schema::dropIfExists('fb_entries');
    }
}

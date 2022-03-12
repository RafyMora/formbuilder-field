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
            $table->text('intro')->nullable();
            $table->text('text_button');
            $table->text('form')->nullable();
            $table->boolean('in_database')->default(0);
            $table->boolean('by_mail')->default(0);
            $table->boolean('display_title')->default(1);
            $table->boolean('display_intro')->default(1);
            $table->timestamps();
        });
        Schema::create('fb_entries', function (Blueprint $table) {
            $table->id();
            $table->text('structure_form')->nullable();
            $table->text('structure_result')->nullable();
            $table->foreignId('fb_form_id');
            $table->timestamps();
            $table->foreign('fb_form_id')->references('id')->on('fb_forms');
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

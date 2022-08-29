<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRecaptchaOptions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('fb_forms', function (Blueprint $table) {
            $table->boolean('display_captcha')->default(0)->after('by_mail');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('fb_forms', function (Blueprint $table) {
            $table->dropColumn('display_captcha');
        });
    }
}

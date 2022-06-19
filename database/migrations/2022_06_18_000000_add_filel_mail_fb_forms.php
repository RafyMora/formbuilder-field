<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFilelMailFbForms extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('fb_forms', function (Blueprint $table) {
            $table->string('mail_to', 255)->nullable()->after('by_mail');
            $table->boolean('include_data')->default(0)->after('mail_to');
            $table->string('subject_admin', 255)->nullable()->after('include_data');
            $table->text('message_admin')->nullable()->after('subject_admin');
            $table->boolean('copy_user')->default(0)->after('message_admin');
            $table->string('field_mail_name')->nullable()->after('copy_user');
            $table->string('subject_user', 255)->nullable()->after('field_mail_name');
            $table->text('message_user')->nullable()->after('subject_user');
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
            $table->dropColumn('mail_to');
            $table->dropColumn('include_data');
            $table->dropColumn('subject_admin');
            $table->dropColumn('message_admin');
            $table->dropColumn('copy_user');
            $table->dropColumn('field_mail_name');
            $table->dropColumn('subject_user');
            $table->dropColumn('message_user');
        });
    }
}

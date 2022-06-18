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
            $table->string('mail_to', 255)->after('by_mail');
            $table->boolean('include_data')->default(0)->after('mail_to');
            $table->string('subject_admin', 255)->after('include_data');
            $table->text('message_admin')->after('subject_admin');
            $table->boolean('copy_user')->default(0)->after('message_admin');
            $table->string('field_mail_name')->after('copy_user');
            $table->string('subject_user', 255)->after('field_mail_name');
            $table->text('message_user')->after('subject_user');
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
            $table->removeColumn('mail_to');
            $table->removeColumn('include_data');
            $table->removeColumn('subject_admin');
            $table->removeColumn('message_admin');
            $table->removeColumn('copy_user');
            $table->removeColumn('field_mail_name');
            $table->removeColumn('subject_user');
            $table->removeColumn('message_user');
        });
    }
}

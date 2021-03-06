<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnsToCoreEmailAlertsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('core_email_alerts', function (Blueprint $table) {
            $table->string('status')->nullable()->after('meta');
            $table->dateTime('sent_at')->nullable()->after('meta');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('core_email_alerts', function (Blueprint $table) {
            $table->dropColumn('status');
            $table->dropColumn('sent_at');
        });
    }
}

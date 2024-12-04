<?php

namespace AppLogger\Logger\Updates;

use Schema;
use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;
use AppUser\User\Models\User;

/**
 * UpdateLogsTable Migration
 *
 * @link https://docs.octobercms.com/3.x/extend/database/structure.html
 */
return new class extends Migration
{
    /**
     * up builds the migration
     */
    public function up()
    {
        Schema::table('applogger_logger_logs', function (Blueprint $table) {
            $table->dropColumn('name');
            // REVIEW - Tip - Môžeš si pozrieť aj ->foreignIdFor, je to trochu elegantnejšie ako ->foreignId
            $table->foreignId('user_id')->references('id')->on('appuser_user_users')->onDelete('cascade');
            //$table->foreignIdFor(User::class)->onDelete('cascade'); 
        });
    }

    /**
     * down reverses the migration
     */
    public function down()
    {
        Schema::table('appblog_blog_blogs', function (Blueprint $table) {
            $table->string('name');
            $table->dropColumn('user_id');
        });
    }
};

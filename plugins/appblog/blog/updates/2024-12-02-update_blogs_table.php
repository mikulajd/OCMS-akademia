<?php

namespace AppBlog\Blog\Updates;

use Schema;
use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;

/**
 * UpdateBlogsTable Migration
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
        Schema::table('appblog_blog_blogs', function (Blueprint $table) {
            $table->dropTimestamps();
            $table->timestamp('published_at')->nullable();
        });
    }

    /**
     * down reverses the migration
     */
    public function down()
    {
        Schema::table('appblog_blog_blogs', function (Blueprint $table) {
            $table->timestamps();
            $table->dropColumn('published_at');
        });
    }
};

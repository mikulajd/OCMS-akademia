<?php

namespace AppBlog\Blog;

use Backend;
use System\Classes\PluginBase;

/**
 * Plugin Information File
 *
 * @link https://docs.octobercms.com/3.x/extend/system/plugins.html
 */
class Plugin extends PluginBase
{
    /**
     * pluginDetails about this plugin.
     */
    public function pluginDetails()
    {
        return [
            'name' => 'Blog',
            'description' => 'No description provided yet...',
            'author' => 'AppBlog',
            'icon' => 'icon-leaf'
        ];
    }


    /**
     * registerNavigation used by the backend.
     */
    // public function registerNavigation()
    // {
    //     return [
    //         'blog' => [
    //             'label'       => 'Blog Management',
    //             'url'         => \Backend::url('appblog/blog/blogs'),
    //             'icon'        => 'icon-pencil',
    //             'permissions' => ['appblog.blog.manage_blogs'],
    //             'order'       => 500,
    //         ],
    //     ];
    // }
}

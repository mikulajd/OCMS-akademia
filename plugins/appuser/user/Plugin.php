<?php

namespace AppUser\User;

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
            'name' => 'User',
            'description' => 'No description provided yet...',
            'author' => 'AppUser',
            'icon' => 'icon-leaf'
        ];
    }



    /**
     * registerNavigation used by the backend.
     */
    public function registerNavigation()
    {

        return [
            'user' => [
                'label' => 'User',
                'url' => Backend::url('appuser/user/mycontroller'),
                'icon' => 'icon-leaf',
                'permissions' => ['appuser.user.*'],
                'order' => 500,
            ],
        ];
    }
}

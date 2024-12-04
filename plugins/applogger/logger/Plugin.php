<?php

namespace AppLogger\Logger;

use Backend;
use System\Classes\PluginBase;
use AppLogger\Logger\Middleware\AuthMiddleware;

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
            'name' => 'Logger',
            'description' => 'No description provided yet...',
            'author' => 'AppLogger',
            'icon' => 'icon-leaf'
        ];
    }
    public function registerNavigation()
    {
        return [
            'log' => [
                'label'       => 'Logs',
                'url'         => \Backend::url('applogger/logger/logs'),
                'icon'        => 'icon-components',
                'permissions' => ['applogger.logger.*'],
                'order'       => 600,
            ],
        ];
    }
}

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
    /* REVIEW - Tip - Tu len do budúcna (level 2 / 3) odporúčam odstrániť funkcie ktoré nič nerobia alebo sú bloknuté cez
    "return []; // Remove this line to activate"
    Bude tak jasnejšie čo všetko sa v Plugin.php deje */


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
}

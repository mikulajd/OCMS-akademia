<?php namespace AppUser\User\Controllers;

use BackendMenu;
use Backend\Classes\Controller;

/**
 * User Controller Backend Controller
 *
 * @link https://docs.octobercms.com/3.x/extend/system/controllers.html
 */
class UserController extends Controller
/* REVIEW - Úplne nerozumiem prečo existuje tento file a ešte Users.php, toto si generoval cez php artisan create:controller?
a to isté pri loggeri, máš tam 2 controlleri ale mal by stačiť jeden */
{
    public $implement = [
        \Backend\Behaviors\FormController::class,
        \Backend\Behaviors\ListController::class,
    ];

    /**
     * @var string formConfig file
     */
    public $formConfig = 'config_form.yaml';

    /**
     * @var string listConfig file
     */
    public $listConfig = 'config_list.yaml';

    /**
     * @var array required permissions
     */
    public $requiredPermissions = ['appuser.user.usercontroller'];

    /**
     * __construct the controller
     */
    public function __construct()
    {
        parent::__construct();

        BackendMenu::setContext('AppUser.User', 'user', 'usercontroller');
    }
}

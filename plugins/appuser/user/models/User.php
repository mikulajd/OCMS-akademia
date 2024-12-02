<?php

namespace AppUser\User\Models;

use Model;

/**
 * User Model
 *
 * @link https://docs.octobercms.com/3.x/extend/system/models.html
 */
class User extends Model
{
    use \October\Rain\Database\Traits\Validation;
    public $fillable = ['user_name', 'password'];

    /**
     * @var string table name
     */
    public $table = 'appuser_user_users';

    /**
     * @var array rules for validation
     */
    public $rules = [];
}

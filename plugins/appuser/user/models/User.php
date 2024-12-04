<?php

namespace AppUser\User\Models;

use AppLogger\Logger\Models\Log;
use Model;
use Hash;

/**
 * User Model
 *
 * @link https://docs.octobercms.com/3.x/extend/system/models.html
 */
class User extends Model
{
    use \October\Rain\Database\Traits\Validation;
    use \October\Rain\Database\Traits\Hashable;
    public $fillable = ['user_name', 'password'];
    protected $hashable = ['password'];

    public $hasMany = [
        'logs' => [
            Log::class, // REVIEW - Nikdy neimportuj classy ako string path, radšej to importni cez use ako to máš hore a tu to už použi: Log::class
            'key' => 'user_id',
        ],
    ];

    /**
     * @var string table name
     */
    public $table = 'appuser_user_users';

    /**
     * @var array rules for validation
     */
    public $rules = [];
}

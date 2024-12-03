<?php

namespace AppUser\User\Models;

use AppLogger\Logger\Models\Log;
use Illuminate\Database\Eloquent\Relations\HasMany;
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
    public $fillable = ['user_name', 'password'];

    public $hasMany = [
        'logs' => [
            'AppLogger\Logger\Models\Log',
            'key' => 'user_id', // Optional if 'user_id' is the default foreign key
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


    public function beforeSave()
    {
        if ($this->isDirty('password')) {
            $this->password = Hash::make($this->password);
        }
    }
}

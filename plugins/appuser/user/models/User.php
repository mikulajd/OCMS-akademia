<?php

namespace AppUser\User\Models;

use AppLogger\Logger\Models\Log;
use Illuminate\Database\Eloquent\Relations\HasMany;
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

    public function logs(): HasMany
    {
        return $this->hasMany(Log::class);
    }

    /**
     * @var string table name
     */
    public $table = 'appuser_user_users';

    /**
     * @var array rules for validation
     */
    public $rules = [];
}

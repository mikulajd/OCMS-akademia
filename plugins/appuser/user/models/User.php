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
            'AppLogger\Logger\Models\Log', // REVIEW - Nikdy neimportuj classy ako string path, radšej to importni cez use ako to máš hore a tu to už použi: Log::class
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
        // REVIEW - Tip - Heslo môžeš hashovať aj cez "hashable" attribute, pozri OCMS docs
        if ($this->isDirty('password')) {
            $this->password = Hash::make($this->password);
        }
    }
}

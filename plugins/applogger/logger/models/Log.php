<?php

namespace AppLogger\Logger\Models;

use AppUser\User\Models\User;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Model;

/**
 * Log Model
 *
 * @link https://docs.octobercms.com/3.x/extend/system/models.html
 */
class Log extends Model
{
    use \October\Rain\Database\Traits\Validation;
    public $fillable = ['arrived_at', 'user_id', 'is_late'];
    public $timestamps = false;
    //!!Definovanie relationship cez variables nie funkcie!!
    // REVIEW - Ano, tento spôsob cez variable je ten "správny" :DD
    public $belongsTo = ['user' => [User::class]];

    /**
     * @var string table name
     */
    public $table = 'applogger_logger_logs';

    /**
     * @var array rules for validation
     */
    public $rules = [];

    // REVIEW - Jo, toto v OCMS nepotrebuješ keďže sa to robí cez $hasOne, $hasMany, $belongsTo, $belongsToMany...
    //!!DO BUDUCNOSTI !!!  TOTO JE VRAJ SKOR PRE LARAVEL
    //     public function user(): BelongsTo
    //     {
    //         return $this->belongsTo(User::class);
    //     }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $user_id
 * @property boolean $is_debit
 * @property boolean $amount_kg
 * @property int $amount_unit
 * @property int $amount_money
 * @property int $amount_profit
 * @property int $amount_used
 * @property string $created_at
 * @property string $updated_at
 * @property User $user
 */
class Transaction extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['user_id', 'is_debit', 'amount_kg', 'amount_unit', 'amount_money', 'amount_profit', 'amount_used', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}

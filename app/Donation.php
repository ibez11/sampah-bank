<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $customer_id
 * @property float $amount_unit
 * @property string $message
 * @property string $transaction_date
 * @property string $created_at
 * @property string $updated_at
 * @property Customer $customer
 */
class Donation extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['customer_id', 'amount_unit', 'message', 'transaction_date', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function customer()
    {
        return $this->belongsTo('App\Customer');
    }
}

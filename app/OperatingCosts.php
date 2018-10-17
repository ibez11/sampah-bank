<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property float $amount_unit
 * @property string $description
 * @property string $created_at
 * @property string $updated_at
 */
class OperatingCosts extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['amount_unit', 'description', 'transaction_date', 'created_at', 'updated_at'];

}

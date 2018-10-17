<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $city_id
 * @property int $product_id
 * @property float $amount_unit
 * @property float $amount_profit
 * @property string $created_at
 * @property string $updated_at
 * @property City $city
 * @property Product $product
 */
class Settings extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['city_id', 'product_id', 'amount_unit', 'amount_profit', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function city()
    {
        return $this->belongsTo('App\City');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function product()
    {
        return $this->belongsTo('App\Product');
    }
}

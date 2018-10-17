<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $city
 * @property float $minimum_balance
 * @property string $created_at
 * @property string $updated_at
 * @property Setting[] $settings
 */
class City extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['city', 'minimum_balance', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function settings()
    {
        return $this->hasMany('App\Setting');
    }
}

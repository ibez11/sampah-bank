<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $religion
 * @property string $created_at
 * @property string $updated_at
 * @property Customer[] $customers
 */
class Religion extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['religion', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function customers()
    {
        return $this->hasMany('App\Customer');
    }
}

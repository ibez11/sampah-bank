<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $name
 * @property string $description
 * @property string $address
 * @property string $phone
 * @property string $created_at
 * @property string $updated_at
 * @property Subinstitution[] $subinstitutions
 */
class Institution extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['name', 'description', 'address', 'phone', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function subinstitutions()
    {
        return $this->hasMany('App\Subinstitution');
    }
}

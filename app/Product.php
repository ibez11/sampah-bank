<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $jenis_barang
 * @property string $created_at
 * @property string $updated_at
 * @property Setting[] $settings
 */
class Product extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['jenis_barang', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function settings()
    {
        return $this->hasMany('App\Setting');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $name
 */
class Division extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['name'];

    public function employees() {
      return $this->hasMany('App\Employee');
    }
}

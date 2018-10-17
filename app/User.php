<?php

namespace App;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $customer_id
 * @property string $email
 * @property string $phone_number
 * @property string $password
 * @property string $remember_token
 * @property string $created_at
 * @property string $updated_at
 * @property string $last_login
 * @property Customer $customer
 */
class User extends Model implements Authenticatable
{
    /**
     * @var array
     */
    protected $fillable = ['customer_id', 'email', 'phone_number', 'password', 'remember_token', 'created_at', 'updated_at', 'last_login'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */

    protected $dates = [
      'last_login'
    ];
    
    public function customer()
    {
        return $this->belongsTo('App\Customer');
    }

    public function transactions() {
      return $this->hasMany('App\Transaction');
    }

    public function getAuthIdentifierName() {

    }

    public function getAuthIdentifier() {

    }

    public function getAuthPassword() {

    }

    public function getRememberToken() {

    }
    public function setRememberToken($value) {

    }
    public function getRememberTokenName() {

    }
}

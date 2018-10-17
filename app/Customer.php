<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $religion_id
 * @property int $subinstitution_id
 * @property string $identity_no
 * @property string $fullname
 * @property string $birthplace
 * @property string $birthdate
 * @property string $address
 * @property string $city
 * @property string $customer_type
 * @property string $corporate_name
 * @property string $sex
 * @property string $phone_number
 * @property string $customerAvatar
 * @property string $created_at
 * @property string $updated_at
 * @property Religion $religion
 * @property Subinstitution $subinstitution
 * @property User[] $users
 */
class Customer extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['religion_id', 'subinstitution_id', 'identity_no', 'fullname', 'birthplace', 'birthdate', 'address', 'city', 'customer_type', 'corporate_name', 'sex', 'phone_number', 'customerAvatar', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function religion()
    {
        return $this->belongsTo('App\Religion');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function subinstitution()
    {
        return $this->belongsTo('App\Subinstitution');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function users()
    {
        return $this->hasMany('App\User');
    }
}

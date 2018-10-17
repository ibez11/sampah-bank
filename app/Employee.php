<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $city_id
 * @property int $division_id
 * @property string $employee_no
 * @property string $fullname
 * @property string $birthplace
 * @property string $birthdate
 * @property string $address
 * @property string $city
 * @property string $sex
 * @property string $phone_number
 * @property string $employeeAvatar
 * @property string $created_at
 * @property string $updated_at
 * @property City $city
 * @property Division $division
 * @property User[] $users
 */
class Employee extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['city_id', 'division_id', 'employee_no', 'fullname', 'birthplace', 'birthdate', 'address', 'city', 'sex', 'phone_number', 'employeeAvatar', 'created_at', 'updated_at'];

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
    public function division()
    {
        return $this->belongsTo('App\Division');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function users()
    {
        return $this->hasMany('App\User');
    }
}

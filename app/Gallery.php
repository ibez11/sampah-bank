<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $uploaded_employee_id
 * @property string $title
 * @property string $description
 * @property string $path
 * @property string $created_at
 * @property string $updated_at
 * @property Employee $employee
 */
class Gallery extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['uploaded_employee_id', 'title', 'description', 'path', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function employee()
    {
        return $this->belongsTo('App\Employee', 'uploaded_employee_id');
    }
}

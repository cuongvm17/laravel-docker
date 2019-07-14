<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    const CREATED_AT = 'creation_date';

    const UPDATED_AT = 'last_update';

    /**
    * The database table used by the model.
    *
    * @var string
    */
    protected $table = 'profiles';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['user_id', 'first_name', 'last_name', 'gender', 'address', 'phone'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App/Models/User');
    }
}

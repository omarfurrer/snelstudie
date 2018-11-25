<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CitiesVariableRule extends Model {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'cities_variables_rules';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['cities_variable_id', 'city_id', 'rule'];

    /**
     * A Cities Variable Rule belongs to a City.
     *
     * @return BelongsTo
     */
    public function city()
    {
        return $this->belongsTo('App\Models\City');
    }

}

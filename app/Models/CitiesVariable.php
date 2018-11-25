<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\CitiesVariableRule;
use Illuminate\Database\Eloquent\Relations\HasMany;

class CitiesVariable extends Model {

    public static $codePrefix = 'city_';

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'cities_variables';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'code', 'default_value', 'default_fixed_value', 'default_field_name'];

    /**
     * A city variable has many rules.
     *
     * @return HasMany
     */
    public function rules()
    {
        return $this->hasMany(CitiesVariableRule::class);
    }

}

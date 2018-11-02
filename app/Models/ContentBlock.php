<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContentBlock extends Model {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'content_blocks';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'code', 'content'];

}

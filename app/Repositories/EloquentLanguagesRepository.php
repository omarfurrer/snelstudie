<?php

namespace App\Repositories;

use App\Repositories\Interfaces\LanguagesRepositoryInterface;
use App\Models\Language;

class EloquentLanguagesRepository extends EloquentAbstractRepository implements LanguagesRepositoryInterface {

    /**
     * Languages Repository constructor.
     */
    public function __construct()
    {
        $this->modelClass = Language::class;
    }

    /**
     * Create Language.
     * 
     * @param array $fields
     * @return Language
     */
    public function create(array $fields = null)
    {
        $fields['slug'] = str_slug($fields['name']);

        return parent::create($fields);
    }

}

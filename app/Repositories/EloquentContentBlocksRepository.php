<?php

namespace App\Repositories;

use App\Repositories\Interfaces\ContentBlocksRepositoryInterface;
use App\Models\ContentBlock;

class EloquentContentBlocksRepository extends EloquentAbstractRepository implements ContentBlocksRepositoryInterface {

    /**
     * Provinces Repository constructor.
     */
    public function __construct()
    {
        $this->modelClass = ContentBlock::class;
    }

}

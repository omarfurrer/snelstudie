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

    /**
     * Create Content Block.
     * 
     * @param array $fields
     * @return ContentBlock
     */
    public function create(array $fields = null)
    {
        $fields['code'] = str_replace('-', '_', $fields['code']);

        return parent::create($fields);
    }

    /**
     * Update Content Block.
     * 
     * @param Integer $id
     * @param array $fields
     * @return ContentBlock
     */
    public function update($id, array $fields = null)
    {
        $fields['code'] = str_replace('-', '_', $fields['code']);

        return parent::update($id, $fields);
    }

}

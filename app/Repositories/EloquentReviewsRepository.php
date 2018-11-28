<?php

namespace App\Repositories;

use App\Repositories\Interfaces\ReviewsRepositoryInterface;
use App\Models\Review;

class EloquentReviewsRepository extends EloquentAbstractRepository implements ReviewsRepositoryInterface {

    /**
     * Reviews Repository constructor.
     */
    public function __construct()
    {
        $this->modelClass = Review::class;
    }

}

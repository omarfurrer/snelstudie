<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Interfaces\ReviewsRepositoryInterface;
use App\Repositories\Interfaces\CategoriesRepositoryInterface;
use App\Http\Requests\Reviews\StoreReviewRequest;
use App\Http\Requests\Reviews\UpdateReviewRequest;
use App\Models\Review;

class ReviewsController extends Controller {

    /**
     * @var ReviewsRepositoryInterface 
     */
    protected $reviewsRepository;

    /**
     * @var CategoriesRepositoryInterface 
     */
    protected $categoriesRepository;

    /**
     * ReviewsController Constructor.
     * 
     * @param ReviewsRepositoryInterface $reviewsRepository
     * @param CategoriesRepositoryInterface $categoriesRepository
     */
    public function __construct(ReviewsRepositoryInterface $reviewsRepository, CategoriesRepositoryInterface $categoriesRepository)
    {
        $this->reviewsRepository = $reviewsRepository;
        $this->categoriesRepository = $categoriesRepository;
    }

    /**
     * List all content blocks. 
     * 
     * @return \Illuminate\View\View | \Illuminate\Contracts\View\Factory
     */
    public function index()
    {
        $reviews = $this->reviewsRepository->all();
        return view('admin.reviews.index', compact('reviews'));
    }

    /**
     * Load create new content block page.
     * 
     * @return \Illuminate\View\View | \Illuminate\Contracts\View\Factory
     */
    public function create()
    {
        $categories = $this->categoriesRepository->lists();
        return view('admin.reviews.create', compact('categories'));
    }

    /**
     * Store content block.
     * 
     * @param StoreReviewRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreReviewRequest $request)
    {
        $this->reviewsRepository->create($request->all());
        return redirect()->to('/admin/reviews');
    }

    /**
     * Load view to edit a content block.
     * 
     * @param Review $review
     * @return \Illuminate\View\View | \Illuminate\Contracts\View\Factory
     */
    public function edit(Review $review)
    {
        $categories = $this->categoriesRepository->lists();
        return view('admin.reviews.edit', compact('review', 'categories'));
    }

    /**
     * Update content block.
     * 
     * @param UpdateReviewRequest $request
     * @param Review $review
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateReviewRequest $request, Review $review)
    {
        $this->reviewsRepository->update($review->id, $request->all());
        return redirect()->to('/admin/reviews');
    }

    /**
     * Delete a content block.
     * 
     * @param Review $review
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Review $review)
    {
        $this->reviewsRepository->delete($review);
        return redirect()->to('/admin/reviews');
    }

}

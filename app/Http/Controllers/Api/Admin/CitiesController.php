<?php

namespace App\Http\Controllers\Api\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Interfaces\CitiesRepositoryInterface;

class CitiesController extends Controller {

    /**
     * @var CitiesRepositoryInterface 
     */
    protected $citiesRepository;

    /**
     * CitiesController Constructor.
     * 
     * @param CitiesRepositoryInterface $citiesRepository
     */
    public function __construct(CitiesRepositoryInterface $citiesRepository)
    {
        $this->citiesRepository = $citiesRepository;
    }

    /**
     * Return a list of cities and their ids as key.
     * 
     * @return \Illuminate\Http\JsonResponse
     */
    public function lists()
    {
        $cities = $this->citiesRepository->lists();
        return response()->json(compact('cities'));
    }

}

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
     * Return all cities.
     * 
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $cities = $this->citiesRepository->all();
        return response()->json(compact('cities'));
    }

}

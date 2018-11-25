<?php

use Illuminate\Database\Seeder;
use App\Repositories\Interfaces\CategoriesRepositoryInterface;

class CategoriesTableSeeder extends Seeder {

    /**
     * @var CategoriesRepositoryInterface 
     */
    protected $categoriesRepository;

    /**
     * @param CategoriesRepositoryInterface $categoriesRepository
     */
    public function __construct(CategoriesRepositoryInterface $categoriesRepository)
    {
        $this->categoriesRepository = $categoriesRepository;
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->categoriesRepository->create(['name' => 'Automotive']);
        $this->categoriesRepository->create(['name' => 'Business']);
        $this->categoriesRepository->create(['name' => 'Financial']);
        $this->categoriesRepository->create(['name' => 'Videogames']);
        $this->categoriesRepository->create(['name' => 'Legal']);
        $this->categoriesRepository->create(['name' => 'Medical']);
        $this->categoriesRepository->create(['name' => 'Localization']);
        $this->categoriesRepository->create(['name' => 'Pharmaceutical']);
        $this->categoriesRepository->create(['name' => 'News']);
        $this->categoriesRepository->create(['name' => 'Scientific Journals']);
        $this->categoriesRepository->create(['name' => 'Software']);
        $this->categoriesRepository->create(['name' => 'Technical']);
        $this->categoriesRepository->create(['name' => 'Tourism']);
        $this->categoriesRepository->create(['name' => 'Website']);
    }

}

<?php

use Illuminate\Database\Seeder;
use App\Repositories\Interfaces\ProvincesRepositoryInterface;
use App\Repositories\Interfaces\CitiesRepositoryInterface;

class ProvincesCitiesSeeder extends Seeder {

    /**
     * @var ProvincesRepositoryInterface 
     */
    protected $provincesRepository;

    /**
     * @var CitiesRepositoryInterface 
     */
    protected $citiesRepository;

    public function __construct(ProvincesRepositoryInterface $provincesRepository, CitiesRepositoryInterface $citiesRepository)
    {
        $this->provincesRepository = $provincesRepository;
        $this->citiesRepository = $citiesRepository;
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $provinces = $this->getProvincesFromFile();

        foreach ($provinces as $provinceName => $cities) {
            $province = $this->provincesRepository->create([
                'name' => $provinceName
            ]);

            foreach ($cities as $cityName) {
                $this->citiesRepository->create([
                    'name' => $cityName,
                    'province_id' => $province->id
                ]);
            }
        }
    }

    /**
     * Get provinces from file and return it as array.
     * 
     * @return array
     */
    protected function getProvincesFromFile()
    {
        $provinces = [];

        $file = fopen(Storage::disk('local')->path('cities.csv'), 'r');

        while (($line = fgetcsv($file)) !== FALSE) {
            $provinces[$line[1]][] = $line[0];
        }

        fclose($file);

        return $provinces;
    }

}

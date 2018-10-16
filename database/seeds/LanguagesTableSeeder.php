<?php

use Illuminate\Database\Seeder;
use App\Repositories\Interfaces\LanguagesRepositoryInterface;
use Illuminate\Support\Facades\Storage;

class LanguagesTableSeeder extends Seeder {

    /**
     * @var LanguagesRepositoryInterface 
     */
    protected $languagesRepository;

    /**
     * @param LanguagesRepositoryInterface $languagesRepository
     */
    public function __construct(LanguagesRepositoryInterface $languagesRepository)
    {
        $this->languagesRepository = $languagesRepository;
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $langauges = $this->getLanguagesFromFile();

        foreach ($langauges as $code => $langauge) {
            $this->languagesRepository->create([
                'name' => $langauge['name'],
                'native_name' => $langauge['nativeName'],
                'code' => $code
            ]);
        }
    }

    /**
     * Get languages from file and return it as array.
     * 
     * @return array
     */
    protected function getLanguagesFromFile()
    {
        return json_decode(Storage::get('languages.json'), true);
    }

}

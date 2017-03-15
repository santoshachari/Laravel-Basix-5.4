<?php

use Illuminate\Database\Seeder;

class CountriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       /* Read and store data from excel sheet.
        * for more documentation read:
        *  http://www.maatwebsite.nl/laravel-excel/docs/import
        */
        Excel::load(storage_path('import/Countries.xlsx'), function ($reader) {
            $data = $reader->get();
            foreach ($data as $datum) {

                \App\Country::create([
                    'name' => $datum->country,
                    'official_name' => $datum->full_name,
                    'code' => $datum->iso_3166_1,
                    'code_2' => $datum->iso_3166_2,
                    'long' => $datum->longitude,
                    'lat' => $datum->latitude,
                    'zoom_level' => $datum->zoom_level,
                ]);
            }
        });
    }
}

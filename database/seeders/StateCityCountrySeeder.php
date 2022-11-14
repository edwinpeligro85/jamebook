<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StateCityCountrySeeder extends Seeder
{
    public function run()
    {
        $citiesTable = 'cities';
        $statesTable = 'states';

        DB::table($citiesTable)
            ->orderBy('id')
            ->chunk(100, function ($cities) use ($citiesTable, $statesTable) {
                foreach ($cities as $city) {
                    $state = DB::table($statesTable)->where('id', $city->state_id)->first();
                    if ($state) {
                        $countryId = $state->country_id;
                        DB::table($citiesTable)->where('id', $city->id)->update([
                            'country_id' => $countryId,
                        ]);
                    }
                }
            });
    }
}

<?php

namespace App\Containers\Location\UI\API\Transformers;

class LocationTransformer
{
    public function transform($entities)
    {
        // get all provinces
        $provinces = [];
        foreach ($entities as $locations) {
            if ($locations['lvl'] == 1) {
                array_push($provinces, $locations);
            }
        }

        // put all cities in their respective province
        $provincesAndCities = [];
        foreach ($provinces as $province) {
            $cities = [];
            foreach ($entities as $locations) {
                if ($locations['parent'] === $province['id'] && $locations['lvl'] !== 1) {
                    array_push($cities, $locations['name']);
                }
            }
            array_push($provincesAndCities, [
                'province' => $province['name'],
                'cities' => $cities
            ]);
            $data = ['data' => $provincesAndCities];
        }
        return $data;
    }
}

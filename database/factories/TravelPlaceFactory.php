<?php

namespace Database\Factories;

use App\Models\TravelPlace;
use Illuminate\Database\Eloquent\Factories\Factory;

class TravelPlaceFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = TravelPlace::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $mapCenterLatitude = -2.68496;
        $mapCenterLongitude = 113.95365;
        $minLatitude = $mapCenterLatitude - 0.05;
        $maxLatitude = $mapCenterLatitude + 0.05;
        $minLongitude = $mapCenterLongitude - 0.07;
        $maxLongitude = $mapCenterLongitude + 0.07;

        return [
            'type_id' => 1,
            'creator_id' => 1,
            'is_active' => true,
            'name_place' => $this->faker->firstName,
            'address' => $this->faker->address,
            'provinsi' => $this->faker->lastName,
            'kabupaten' => $this->faker->lastName,
            'latitude' => $this->faker->latitude($minLatitude, $maxLatitude),
            'longitude' => $this->faker->longitude($minLongitude, $maxLongitude),
            'description' => $this->faker->text,
            'image' => 'https://picsum.photos/200/300'
        ];
    }
}

<?php

namespace Database\Factories;

use App\Models\TravelPlace;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

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
        $minLatitude = $mapCenterLatitude - 3.9;
        $maxLatitude = $mapCenterLatitude + 3.9;
        $minLongitude = $mapCenterLongitude - 2.07;
        $maxLongitude = $mapCenterLongitude + 2.07;

        return [
            'type_id' => $this->faker->numberBetween(1, 4),
            'creator_id' => 1,
            'is_active' => true,
            'name_place' => $this->faker->firstName,
            'slug' => Str::slug($this->faker->firstName),
            'address' => $this->faker->address,
            'provinsi' => $this->faker->lastName,
            'kabupaten' => $this->faker->lastName,
            'latitude' => $this->faker->latitude($minLatitude, $maxLatitude),
            'longitude' => $this->faker->longitude($minLongitude, $maxLongitude),
            'description' => $this->faker->text(1000),
            'image' => 'https://picsum.photos/id/' . $this->faker->numberBetween(1, 100) . '/200/300'
        ];
    }
}

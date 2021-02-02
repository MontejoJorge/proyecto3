<?php

namespace Database\Factories;

use App\Models\Obra;
use Illuminate\Database\Eloquent\Factories\Factory;

class ObraFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Obra::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "street_name" => $this->faker->streetName,
            "postal_code" =>  $this->faker->postcode,
            "number" =>  $this->faker->numberBetween(1,50),
            "floor" =>  $this->faker->numberBetween(0,13),
            "door" =>  $this->faker->randomElement(["I","D","C","A","B","D"]),
            "city" =>  $this->faker->city,
            "province" => $this->faker->citySuffix,
            "description" => $this->faker->text,
            "latitude" => $this->faker->latitude($min = 40, $max = 45),
            "longitude" => $this->faker->longitude($min = 0, $max = -4),

        ];
    }
}
// `worker_id` bigint unsigned DEFAULT NULL,
// `number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
// `floor` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
// `door` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
// `start_date` date DEFAULT NULL,
// `end_date` date DEFAULT NULL,
// `state` enum('created','pending','denied','authorized') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'created',
// `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
// `blueprint` longtext COLLATE utf8mb4_unicode_ci,
// `created_at` timestamp NULL DEFAULT NULL,
// `updated_at` timestamp NULL DEFAULT NULL,
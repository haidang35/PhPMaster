<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "product_name"=>$this->faker->name(),
            "product_image"=>$this->faker->imageUrl(),
            "product_price"=> rand(0, 2000000),
            "product_quantity"=> rand(0, 100),
            "category_id"=>rand(1, 34),
            "brand_id"=>rand(1, 50),
            "product_desc"=> $this->faker->text(100),

        ];
    }
}

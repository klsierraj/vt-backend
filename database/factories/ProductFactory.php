<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    protected $model = Product::class;

    public function definition()
    {
        $techProducts = [
            'Laptop Pro 2024',
            'Gaming Headset',
            'Smartwatch Series 7',
            '4K Ultra HD Monitor',
            'Wireless Mechanical Keyboard',
            'Bluetooth Noise Cancelling Earbuds',
            'External SSD 1TB',
            'Smart Home Hub',
            'Portable Power Bank',
            'USB-C Multiport Adapter',
            'Gaming Mouse',
            'VR Headset',
            'Action Camera 4K',
            'Portable Bluetooth Speaker',
            'Drone with 4K Camera',
            'Smart Thermostat',
            'Fitness Tracker',
            'Smart Light Bulb',
            'Streaming Media Player',
            'Wireless Charging Pad'
        ];

        return [
            'name' => $this->faker->randomElement($techProducts), 
            'price' => $this->faker->randomFloat(2, 50, 2000), 
            'description' => $this->faker->paragraph, 
        ];
    }
}

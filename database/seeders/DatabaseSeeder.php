<?php

namespace Database\Seeders;

use App\Models\Order;
use App\Models\Post;
use App\Models\Product;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Database\Factories\ProductFactory;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(3)->create();

        Post::factory(10)->create();

        Product::factory(25)->create();
        Order::factory(45)->create();

        foreach (Order::all() as $order) {
            $products = Product::inRandomOrder()->take(3)->get();
            $order->products()->attach($products, ['quantity' => rand(1, 3)]);
        }
    }
}

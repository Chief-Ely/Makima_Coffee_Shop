<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CoffeeSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('coffees')->insert([
            [
                'name' => 'Americano',
                'price' => 120.00,
                'description' => 'Smooth espresso with hot water for a rich, bold taste.',
                'image_path' => 'americano.jpg',
            ],
            [
                'name' => 'Mocha',
                'price' => 150.00,
                'description' => 'A chocolate-flavored coffee drink with whipped cream on top.',
                'image_path' => 'mocha.jpg',
            ],
            [
                'name' => 'Cappuccino',
                'price' => 140.00,
                'description' => 'Espresso with steamed milk foam for a creamy finish.',
                'image_path' => 'cappuccino.jpg',
            ],
            [
                'name' => 'Flat White',
                'price' => 135.00,
                'description' => 'Espresso with velvety microfoam for a smooth texture.',
                'image_path' => 'flat_white.jpg',
            ],
            [
                'name' => 'Espresso',
                'price' => 100.00,
                'description' => 'Strong, rich espresso shot with intense flavor.',
                'image_path' => 'espresso.jpg',
            ],
            [
                'name' => 'Matcha',
                'price' => 160.00,
                'description' => 'Japanese green tea latte with a smooth, earthy taste.',
                'image_path' => 'matcha.jpg',
            ],
            [
                'name' => 'Iced Coffee',
                'price' => 130.00,
                'description' => 'Chilled coffee over ice for a refreshing energy boost.',
                'image_path' => 'iced_coffee.jpg',
            ],
            [
                'name' => 'Caffè Macchiato',
                'price' => 145.00,
                'description' => 'Espresso topped with a small amount of foamed milk.',
                'image_path' => 'macchiato.jpg',
            ],
        ]);
    }
}

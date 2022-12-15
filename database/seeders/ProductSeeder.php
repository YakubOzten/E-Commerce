<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $products = [
            [
                'name' => 'T-short',
                'description' => 'Renkli polo tshort',
                'image' => 'https://dummyimage.com/600x400/000000/0011ff.png&text=T-short',
                'price' => 100
            ],
            [
                'name' => 'Sweetshorts',
                'description' => 'Uzun mavi Sweetshort',
                'image' => 'https://dummyimage.com/200x300/000/fff&text=Iphone',
                'price' => 300
            ],
            [
                'name' => 'Gomlek',
                'description' => 'V yaka mavı gomlek',
                'image' => 'https://dummyimage.com/200x300/000/fff&text=Google',
                'price' => 200
            ],
            [
                'name' => 'Pantolon',
                'description' => 'koton blue cinphp artisan db:seed --class=ProductSeeder',
                'image' => 'https://dummyimage.com/200x300/000/fff&text=LG',
                'price' => 200
            ]
        ];

        foreach ($products as $key => $value) {
            Product::create($value);
        }
    }

}

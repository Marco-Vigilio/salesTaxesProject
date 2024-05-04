<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //inserisco i prezzi inventati
        $Products = [
            [
                "id_category" => 1,
                "name" => "book",
                "price" => 100,
                "imported" => 0
            ],
            [
                "id_category" => 4,
                "name" => "music CD",
                "price" => 100,
                "imported" => 0
            ],
            [
                "id_category" => 2,
                "name" => "chocolate bar",
                "price" => 100,
                "imported" => 0
            ],
            [
                "id_category" => 2,
                "name" => "imported box of chocolates",
                "price" => 100,
                "imported" => 1
            ],
            [
                "id_category" => 5,
                "name" => "imported bottle of perfume",
                "price" => 100,
                "imported" => 1
            ],
            [
                "id_category" => 5,
                "name" => "bottle of perfume",
                "price" => 100,
                "imported" => 0
            ],
            [
                "id_category" => 3,
                "name" => "packet of headache pills",
                "price" => 100,
                "imported" => 0
            ],
        ];

        foreach ($Products as $Product) {
            $NewProduct = new Product();
            $NewProduct->id_category = $Product["id_category"];
            $NewProduct->name = $Product["name"];
            $NewProduct->price = $Product["price"];
            $NewProduct->imported = $Product["imported"];
            $NewProduct->save();
        }
    }
}

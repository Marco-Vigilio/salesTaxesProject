<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;


class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $Categories = [
            ["name" => "Books"],
            ["name" => "Food"],
            ["name" => "Medical products"],
            ["name" => "Music"],
            ["name" => "Perfumes"],
        ];

        foreach ($Categories as $Category) {
            $NewCategory = new Category();
            $NewCategory->name = $Category["name"];
            $NewCategory->save();
        }
    }
}

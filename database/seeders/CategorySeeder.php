<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category; //this represents thge categories table

class CategorySeeder extends Seeder
{

    private $category;

    public function __construct(Category $category){
        $this->category = $category;
    }

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        /**
         * Make sure thaat the categories don't  have duplicates
         */
        $categories = [
            [
                'name' => 'Machines',
                'created_at' => NOW(),
                'updated_at' => NOW()
            ],
            [
                'name' => 'Sports',
                'created_at' => NOW(),
                'updated_at' => NOW()
            ],
            [
                'name' => 'Gym Equipment',
                'created_at' => NOW(),
                'updated_at' => NOW()
            ],
            [
                'name' => 'Books',
                'created_at' => NOW(),
                'updated_at' => NOW()
            ]
        ];

        $this->category->insert($categories); //Insert the lists of category to the categories table
    }
}

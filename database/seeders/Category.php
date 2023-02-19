<?php

namespace Database\Seeders;

use App\Models\Catergories;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;

class Category extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Catergories::create([
            [
                'category' => 'مشاريع'
            ],
            [
                'category' => 'كيفيات'
            ]
        ]);
    }
}

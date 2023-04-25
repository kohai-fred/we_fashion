<?php

namespace Database\Seeders;

use App\Models\Size;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SizeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $sizes = [
            ['name' => 'xxs'],
            ['name' => 'xs'],
            ['name' => 's'],
            ['name' => 'm'],
            ['name' => 'l'],
            ['name' => 'xl'],
            ['name' => 'xxl'],
            ['name' => 'xxxl'],
        ];

        foreach ($sizes as $size) {
            Size::create($size);
        }
    }
}

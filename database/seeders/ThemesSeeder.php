<?php

namespace Database\Seeders;

use App\Models\Theme;
use Illuminate\Database\Seeder;

class ThemesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $resources = [
            ['key' => 'nord'],
        ];

        Theme::truncate();

        foreach($resources as $resource) {
            Theme::create([
                'key' => $resource['key'],
            ]);
        }
    }
}

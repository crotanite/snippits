<?php

namespace Database\Seeders;

use App\Models\Tag;
use Illuminate\Database\Seeder;

class TagsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $resources = [
            ['tag' => 'laravel', 'bg_color' => '#fb503b', 'text_color' => '#ffffff'],
        ];

        Tag::truncate();

        foreach($resources as $resource) {
            Tag::create([
                'tag' => $resource['tag'],
                'bg_color' => $resource['bg_color'] ?? null,
                'text_color' => $resource['text_color'] ?? null,
            ]);
        }
    }
}

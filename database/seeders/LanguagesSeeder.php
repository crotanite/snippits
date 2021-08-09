<?php

namespace Database\Seeders;

use App\Models\Language;
use Illuminate\Database\Seeder;

class LanguagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $resources = [
            ['code' => 'css', 'key' => 'css', 'bg_color' => '#2965f1', 'text_color' => '#ffffff'],
            ['code' => 'htmlmixed', 'key' => 'htmlmixed', 'bg_color' => '#e34c26', 'text_color' => '#ffffff'],
            ['code' => 'javascript', 'key' => 'javascript', 'bg_color' => '#f0db4f', 'text_color' => '#323330'],
            ['code' => 'markdown', 'key' => 'markdown', 'bg_color' => null, 'text_color' => null],
            ['code' => 'text/x-php', 'key' => 'php', 'bg_color' => '#8993be', 'text_color' => '#ffffff'],
            ['code' => 'plaintext', 'key' => 'plaintext', 'bg_color' => null, 'text_color' => null],
            ['code' => 'sass', 'key' => 'sass', 'bg_color' => '#cc6699', 'text_color' => '#ffffff'],
            ['code' => 'sql', 'key' => 'sql', 'bg_color' => '#f29111', 'text_color' => '#ffffff'],
            ['code' => 'vue', 'key' => 'vue', 'bg_color' => '#41b883', 'text_color' => '#35495e'],
            ['code' => 'yaml', 'key' => 'yaml', 'bg_color' => null, 'text_color' => null],
        ];

        Language::truncate();

        foreach($resources as $resource) {
            Language::create([
                'code' => $resource['code'],
                'key' => $resource['key'],
                'bg_color' => $resource['bg_color'],
                'text_color' => $resource['text_color'],
            ]);
        }
    }
}

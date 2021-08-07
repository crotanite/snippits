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
            ['name' => 'Github Light', 'key' => 'github-light'],
            ['name' => 'Light Plus', 'key' => 'light-plus'],
            ['name' => 'Material Theme Lighter', 'key' => 'material-theme-lighter'],
            ['name' => 'Min Light', 'key' => 'min-light'],
            ['name' => 'Slack Theme Ochin', 'key' => 'slack-theme-ochin'],
            ['name' => 'Solarized Light', 'key' => 'solarized-light'],
            ['name' => 'Winter Is Coming Light', 'key' => 'winter-is-coming-light'],
            ['name' => 'Serendipity Light', 'key' => 'serendipity-light'],
            ['name' => 'Dark Plus', 'key' => 'dark-plus'],
            ['name' => 'Github Dark', 'key' => 'github-dark'],
            ['name' => 'Material Theme Darker', 'key' => 'material-theme-darker'],
            ['name' => 'Material Theme Default', 'key' => 'material-theme-default'],
            ['name' => 'Material Theme Ocean', 'key' => 'material-theme-ocean'],
            ['name' => 'Material Theme Palenight', 'key' => 'material-theme-palenight'],
            ['name' => 'Min Dark', 'key' => 'min-dark'],
            ['name' => 'Monokai', 'key' => 'monokai'],
            ['name' => 'Nord', 'key' => 'nord'],
            ['name' => 'Slack Theme Dark Mode', 'key' => 'slack-theme-dark-mode'],
            ['name' => 'Solarized Dark', 'key' => 'solarized-dark'],
            ['name' => 'One Dark Pro', 'key' => 'one-dark-pro'],
            ['name' => 'Moonlight', 'key' => 'moonlight'],
            ['name' => 'Moonlight II', 'key' => 'moonlight-ii'],
            ['name' => 'Winter Is Coming Dark', 'key' => 'winter-is-coming-dark'],
            ['name' => 'Winter Is Coming Blue', 'key' => 'winter-is-coming-blue'],
            ['name' => 'Synthwave 84', 'key' => 'synthwave-84'],
            ['name' => 'Fortnite', 'key' => 'fortnite'],
            ['name' => 'Cobalt2', 'key' => 'cobalt2'],
            ['name' => 'Serendipity Dark', 'key' => 'serendipity-dark'],
        ];

        Theme::truncate();

        foreach($resources as $resource) {
            Theme::create([
                'name' => $resource['name'],
                'key' => $resource['key'],
            ]);
        }
    }
}

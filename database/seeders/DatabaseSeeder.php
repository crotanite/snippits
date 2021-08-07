<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
		DB::statement('SET FOREIGN_KEY_CHECKS=0;');

		$this->call([
			\Database\Seeders\LanguagesSeeder::class,
			\Database\Seeders\TagsSeeder::class,
			\Database\Seeders\ThemesSeeder::class,
		]);

		DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}

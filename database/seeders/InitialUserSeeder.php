<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class InitialUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'email' => config('app.initial_user.email'),
            'name' => config('app.initial_user.name'),
            'password' => Hash::make(config('app.initial_user.password')),
            'url' => config('app.initial_user.url'),
        ]);
    }
}

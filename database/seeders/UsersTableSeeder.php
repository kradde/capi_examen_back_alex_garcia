<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\UserDomicilio;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::factory()
            ->count(100)
            ->has(UserDomicilio::factory()->state(function (array $attributes, User $user) {
                return ['user_id' => $user->id];
            }))
            ->create();
    }
}
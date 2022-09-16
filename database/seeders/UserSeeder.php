<?php

namespace Database\Seeders;

use App\Models\User;
use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();

        // $data = [
        //     'name' => 'Superadmin',
        //     'email' => 'superadmin@monitoring.com',
        //     'password' => Hash::make('12345678'),
        // ];

        // $user = User::create($data);
        // $user->assignRole('superadmin');

        // for ($i = 0; $i < 10; $i++) {

        //     $data = [
        //         'name' => $faker->name(),
        //         'email' => $faker->email(),
        //         'password' => Hash::make('12345678'),
        //     ];

        //     $user = User::create($data);
        //     $user->assignRole('user');
        // }

        // $user = User::doesntHave('roles')->get();
        // foreach ($user as $u) {
        //     $u->assignRole('user');
        // }
    }
}

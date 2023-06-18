<?php

namespace Database\Seeders;

use App\Enums\Gender;
use App\Models\{Role, User};
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = User::create([
            'name' => 'Ngademin grup anu',
            'username' => 'ngademin',
            'email' => 'ngademin@gmail.com',
            // 'branch_id' => 1,
            'password' => Hash::make('password'),
        ]);

        $admin->assignRole(Role::findByName('Super Admin')->name);

        $users = [];
        $faker = \Faker\Factory::create('id_ID');

        for ($i = 0; $i < 15; $i++) {
            $users[] = [
                // 'branch_id' => 1,
                // 'id' => strtolower(str()->random(5)),
                'name' => $faker->name(),
                'gender' => $faker->randomElement(Gender::cases()),
                'code' => $faker->randomNumber(8),
                'birth_date' => $faker->date(),
                'birth_place' => $faker->city(),
                'phone' => $faker->phoneNumber(),
                'address' => $faker->address(),
                'username' => $faker->userName() . $i,
                'email' => $i . $faker->email(),
                'password' => Hash::make('password'),
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        // foreach(array_chunk($users, 250) as $user) {
        //     User::insert($user);
        // }

        foreach ($users as $user) {
            $createdUser = User::create($user);

            $createdUser->assignRole('Staff');
        }
    }
}

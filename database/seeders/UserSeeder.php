<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;
use App\Models\User;


class UserSeeder extends Seeder
{
    // private $user;

    // public function __construct(User $user)
    // {
    //     $this->user = $user;
    // }
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $faker = Faker::create();

        foreach (range(1, 10) as $index) {
            DB::table('users')->insert([
                'firstname' => $faker->firstName,
                'lastname' => $faker->lastName,
                'username' => $faker->userName,
                'email' => $faker->unique()->safeEmail,
                'password' => Hash::make('password'),
                'gender' => $faker->randomElement(['Male', 'Female']),
                'height' => $faker->numberBetween(150, 200),
                'prime_weight' => $faker->numberBetween(50, 100),
                'goal_weight' => $faker->numberBetween(50, 100),
                'goal_date' => $faker->date,
                'purpose' => $faker->randomElement(['Gain Weight', 'Lose Weight']),
                'role_id' => \App\Models\User::USER_ROLE_ID, // Adjust this as needed
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}

<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class AdminSeeder extends Seeder
{
    // private $user;

    // public function __construct(User $user)
    // {
    //     $this->user = $user;
    // }
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insertOrIgnore([
            'firstname' => 'Admin',
            'lastname' => 'Admin',
            'username' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('11111111'),
            'gender' => 'Male',
            'height' => 170,
            'prime_weight' => 60,
            'goal_weight' => 65,
            'goal_date' => '2045-12-31',
            'purpose' => 'Gain Weight',
            'role_id' => \App\Models\User::ADMIN_ROLE_ID,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        // $this->user->save();
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    private $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->user->firstname  = 'Admin';
        $this->user->lastname  = 'Admin';
        $this->user->username  = 'Admin';
        $this->user->email = 'admin@gmail.com';
        $this->user->password = Hash::make('11111111');
        $this->user->gender = 'Male';
        $this->user->height = 170;
        $this->user->prime_weight = 60;
        $this->user->goal_weight = 65;
        $this->user->goal_date = '2045-12-31';
        $this->user->purpose = 'Gain Weight';
        $this->user->role_id  = User::ADMIN_ROLE_ID;
        $this->user->save();
    }
}

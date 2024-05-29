<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Community;

class CommunitySeeder extends Seeder
{
    private $community;

    public function __construct(Community $community)
    {
        $this->community = $community;
    }
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $communities = 
        [
            [
                'name'       => 'Healty Food',
                'image'      => '/images/community/community-healthyfood.png',
                'created_at' => Now(),
                'updated_at' => Now()
            ],
            [
                'name'       => 'Excercise',
                'image'      => '/images/community/community-excercise.png',
                'created_at' => Now(),
                'updated_at' => Now()
            ],
            [
                'name'       => 'Yoga',
                'image'      => '/images/community/community-yoga.png',
                'created_at' => Now(),
                'updated_at' => Now()
            ],
            [
                'name'       => 'Build Muscle',
                'image'      => '/images/community/community-muscle.png',
                'created_at' => Now(),
                'updated_at' => Now()
            ],
            [
                'name'       => 'Sleep',
                'image'      => '/images/community/community-sleep.png',
                'created_at' => Now(),
                'updated_at' => Now()
            ],
            [
                'name'       => 'Hobby',
                'image'      => '/images/community/community-hobby.png',
                'created_at' => Now(),
                'updated_at' => Now()
            ],
            [
                'name'       => 'Pets',
                'image'      => '/images/community/community-pets.png',
                'created_at' => Now(),
                'updated_at' => Now()
            ],
            [
                'name'       => 'Stress Management',
                'image'      => '/images/community/community-stressmanagement.png',
                'created_at' => Now(),
                'updated_at' => Now()
            ]
        ];

        $this->community->insert($communities);
    }
}

<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Game;
use App\Models\AgeCategory;
use App\Models\MembershipType;
use App\Models\SportingItem;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        User::factory()->create([
            'username' => 'admin',
            'password' => 'admin',
        ]);

        // Game::factory(15)->create();
        $games = [
            'Swimming',
            'Hockey',
            'Lawn Tennis',
            'Table Tennis',
            'Darts',
            'Badminton',
            'Volleyball',
            'Basketball',
            'Netball',
            'Football',
            'Baseball',
            'Rugby',
            'Pool',
            'Chess',
            'Draft'
        ];

        foreach ($games as $game) {
            Game::factory()->create([
                'name' => $game
            ]);
        }

        MembershipType::factory()->create(
            [
                'category' => 'Individual',
                'amount' => 1000
            ],

        );
        MembershipType::factory()->create(
            [
                'category' => 'Group',
                'amount' => 500
            ],

        );

        // Age Categories

        $age_categories = [
            ['category_name' => 'minor', 'description' => 'Ages 12 to 17 years'],
            ['category_name' => 'middle', 'description' => 'Ages 18 to 25 years'],
            ['category_name' => 'senior', 'description' => 'Ages 26 to 35 years'],
        ];

        foreach ($age_categories as $age_category) {
            AgeCategory::factory()->create([
                'category_name' => $age_category['category_name'],
                'description' => $age_category['description']
            ]);
        }

        // Sporting Itemdescription

        $items = [
            ['name'=> 'Bloomer', 'amount' => 250],
            ['name'=> 'Games shorts', 'amount' => 750],
            ['name'=> 'Hockey stick', 'amount' => 1000],
            ['name'=> 'Socks', 'amount' => 350],
            ['name'=> 'Sports shoes (Nike)', 'amount' => 1000],
            ['name'=> 'Sports shoes (Adiddas)', 'amount' => 2000],
            ['name'=> 'Sports shoes (Jordans)', 'amount' => 3000],
            ['name'=> 'Sports shoes (Puma)', 'amount' => 4000],
            ['name'=> 'Track suit', 'amount' => 1000],
            ['name'=> 'T-shirt', 'amount' => 800],
            ['name'=> 'Wrapper', 'amount' => 450],
        ];

        foreach ($items as $item) {
            SportingItem::factory()->create([
                'name' => $item['name'],
                'amount' => $item['amount']
            ]);
        }
    }
}

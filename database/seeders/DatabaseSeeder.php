<?php

namespace Database\Seeders;

use App\Models\Affiliation;
use App\Models\Collection;
use App\Models\Post;
use App\Models\Series;
use App\Models\User;
use App\Models\Video;
use Illuminate\Database\Eloquent\Factories\Sequence;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // $affiliations = Affiliation::factory(2)->create(
        //     new Sequence(
        //         ['name' => 'conservative'],
        //         ['name' => 'liberal']
        //     )
        // );
        // $users = User::factory(5)->recycle($affiliations)->create();
        // Post::factory(10)->recycle($users)->create();

        Series::factory(3)->has(Video::factory(3))->create();
        Collection::factory(3)->has(Video::factory(2))->create();
    }
}

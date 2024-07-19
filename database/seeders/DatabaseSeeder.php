<?php

namespace Database\Seeders;

use App\Models\Info;
use App\Models\Poll;
use App\Models\PollOption;
use App\Models\PollSubmit;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        User::factory()->create([
            'name' => 'Test User 2',
            'email' => 'test2@example.com',
        ]);

        Info::factory(3)->create();

        Poll::factory()->create([
            'topic' => 'Test Umfrage 1',
            'multi_select' => 'false',
            'info_id' => '1',
            'user_id' => '1'
        ]);

        PollOption::factory()->create([
            'title' => 'Das hier ist die wunderschöne Antwort 1.1',
            'poll_id' => '1',
        ]);

        PollOption::factory()->create([
            'title' => 'Das hier ist die wunderschöne Antwort 1.2',
            'poll_id' => '1',
        ]);

        Poll::factory()->create([
            'topic' => 'Test Umfrage 2',
            'multi_select' => 'true',
            'info_id' => '2',
            'user_id' => '1'
        ]);

        PollOption::factory()->create([
            'title' => 'Das hier ist die wunderschöne Antwort 2.1',
            'poll_id' => '2',
        ]);

        PollOption::factory()->create([
            'title' => 'Das hier ist die wunderschöne Antwort 2.2',
            'poll_id' => '2',
        ]);
    }
}

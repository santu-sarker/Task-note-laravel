<?php

namespace Database\Seeders;

use App\Models\Task;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use \Cviebrock\EloquentSluggable\Services\SlugService;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        for ($i = 0; $i < 500; $i++) {
            $title = $faker->sentence();
            $slug = SlugService::createSlug(Task::class, 'task_slug', $title);
            DB::table('tasks')->insert([
                'title' => $title,
                'description' => $faker->realText($maxNbChars = 250),
                'task_owner' => $faker->randomElement(['1', '2', '3']),
                'task_slug' => $slug,
                'created_at' => $faker->dateTimeBetween('-30 days', '+0 days'),
                'updated_at' => $faker->dateTimeBetween('-30 days', '+0 days'),

            ]);
        }

    }
}

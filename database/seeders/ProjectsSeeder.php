<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Project;
use Faker;
use Illuminate\Support\Str;

class ProjectsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 0; $i < 5; $i++) {


            $faker = Faker\Factory::create('it_IT');
            $newProject = new Project();
            $newProject->title =  $faker->sentence(3);
            $newProject->description =  $faker->text(50);
            $newProject->author =  $faker->name;
            $newProject->creation_date =  $faker->date();
            $newProject->content =  $faker->text(500);
            $newProject->slug = Str::slug($newProject->title);
            $newProject->save();
        }
    }
}

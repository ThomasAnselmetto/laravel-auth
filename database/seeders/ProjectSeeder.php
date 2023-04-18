<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Support\Str;
use Faker\Generator as Faker;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    // importo faker Generator nel run(qui + TAB) Dependency injection e poi ciclo


    
    public function run(Faker $faker)
    {
        for($i = 0;$i < 50;$i++){
            $project = new Project;
            $project->name = $faker->catchPhrase();
            $project->contributors = $faker->numberBetween(1, 20);
            // $project->project_preview_img = $faker->imageUrl(640, 480, 'animals', true);
            $project->slug = Str::of($project->name)->slug('-');
            $project->description = $faker->paragraph(15);
            $project->save();
        }
    }
}
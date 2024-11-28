<?php

namespace Database\Factories;

use App\Models\Activity;
use App\Models\ActivityFile;
use Illuminate\Database\Eloquent\Factories\Factory;

class ActivityFileFactory extends Factory
{
    protected $model = ActivityFile::class;

    public function definition()
    {
        return [
            'activity_id' => Activity::factory(), // Create a related Activity
            'file_path' => $this->faker->filePath(), // Random file path
            'file_name' => $this->faker->word() . '.pdf', // Random file name with extension
            'file_type' => $this->faker->fileExtension(), // Random file extension
        ];
    }
}

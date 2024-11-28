<?php

namespace Database\Factories;

use App\Models\Submission;
use App\Models\SubmissionFile;
use Illuminate\Database\Eloquent\Factories\Factory;

class SubmissionFileFactory extends Factory
{
    protected $model = SubmissionFile::class;

    public function definition()
    {
        return [
            'submission_id' => Submission::factory(), // Creating a related Submission
            'file_path' => $this->faker->filePath(),  // Random file path
            'file_name' => $this->faker->word() . '.pdf', // Random file name
            'file_type' => $this->faker->randomElement(['pdf', 'docx', 'txt']), // Random file type
            'file_size' => $this->faker->numberBetween(1000, 10000), // File size in KB
        ];
    }
}

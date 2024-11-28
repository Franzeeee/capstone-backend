<?php

namespace Database\Factories;

use App\Models\Announcement;
use App\Models\CourseClass;
use Illuminate\Database\Eloquent\Factories\Factory;

class AnnouncementFactory extends Factory
{
    protected $model = Announcement::class;

    public function definition()
    {
        return [
            'content' => $this->faker->text,
            'announcement_date' => $this->faker->date(),
            'file_path' => $this->faker->word,
            'course_class_id' => CourseClass::factory(),  // Associate with CourseClass
        ];
    }
}

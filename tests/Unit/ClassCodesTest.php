<?php

namespace Tests\Unit;

use App\Models\ClassCodes;
use App\Models\CourseClass;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ClassCodesTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test if ClassCodes model belongs to a CourseClass model.
     *
     * This test checks if the 'class_id' in ClassCodes properly references
     * the CourseClass model through the 'courseClass' relationship.
     *
     * @return void
     */
    public function test_it_belongs_to_a_course_class()
    {
        // Create a CourseClass instance
        $courseClass = CourseClass::factory()->create();

        // Create a ClassCodes instance and associate it with the created CourseClass
        $classCode = ClassCodes::factory()->create(['class_id' => $courseClass->id]);

        // Assert that the 'courseClass' relation returns the correct related CourseClass instance
        $this->assertTrue($classCode->courseClass->is($courseClass));
    }

    /**
     * Test if the ClassCodes model generates a valid unique code.
     *
     * This test checks if the 'code' attribute in ClassCodes is being generated
     * as a valid alphanumeric string with a length of 8 characters, as defined in the factory.
     *
     * @return void
     */
    public function test_it_has_a_unique_code()
    {
        // Create a ClassCodes instance
        $classCode = ClassCodes::factory()->create();

        // Assert that the 'code' attribute is a valid alphanumeric string of 8 characters
        $this->assertMatchesRegularExpression('/^[A-Za-z0-9]{8}$/', $classCode->code);
    }
}

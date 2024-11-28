<?php

namespace Tests\Unit;

use App\Models\Certificate;
use App\Models\CourseClass;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CertificateTest extends TestCase
{
    use RefreshDatabase;  // Use this trait to reset the database for each test

    /**
     * Test the Certificate creation.
     *
     * @return void
     */
    public function test_certificate_creation()
    {
        // Create a CourseClass
        $courseClass = CourseClass::factory()->create();

        // Create a Certificate for the CourseClass
        $certificate = Certificate::factory()->create([
            'class_id' => $courseClass->id,  // Associate the certificate with the class
        ]);

        // Assert that the certificate was created and has the expected data
        $this->assertDatabaseHas('certificates', [
            'issue_date' => $certificate->issue_date,
            'issued_to' => $certificate->issued_to,
            'teacher_name' => $certificate->teacher_name,
            'class_name' => $certificate->class_name,
            'class_id' => $courseClass->id,
        ]);

        // Assert that the Certificate belongs to the CourseClass
        $this->assertEquals($courseClass->id, $certificate->class->id);
    }
}

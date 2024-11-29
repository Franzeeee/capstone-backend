<?php

namespace Tests\Feature;

use App\Models\Grade;
use App\Models\Student;
use App\Models\ClassRoom; // Assuming ClassRoom model exists to simulate classes.
use App\Models\CourseClass;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;


class GradeControllerTest extends TestCase
{
    // // Test for fetching all grades of a specific class
    // public function test_fetch_all_student_grades()
    // {
    //     $user = User::factory()->create(); // Adjust this to your user model
    //     $this->actingAs($user);
    //     // Arrange: Create a class, some students, and assign grades
    //     $class = CourseClass::factory()->create();
    //     $students = User::factory()->count(3)->create(); // Assuming a Student model exists
    //     foreach ($students as $student) {
    //         Grade::create([
    //             'class_id' => $class->id,
    //             'student_id' => $student->id,
    //             'final_grade' => rand(60, 100),
    //             'remarks' => "Good progress!",
    //         ]);
    //     }

    //     // Act: Make a request to fetch all grades for the class
    //     $response = $this->getJson(route('grades.fetchAllStudentGrade', ['classId' => $class->id]));

    //     // Assert: Check if the response contains grades and pagination
    //     $response->assertStatus(200)
    //         ->assertJsonStructure([
    //             'data' => [
    //                 '*' => [
    //                     'final_grade',
    //                     'remarks',
    //                     'student' => [
    //                         'id',
    //                         'name',
    //                         // Add other student attributes you expect in the response
    //                     ],
    //                 ],
    //             ],
    //             'links',
    //             'meta',
    //         ])
    //         ->assertJsonCount(10, 'data'); // Assuming pagination of 10 records
    // }

    // // Test for updating a grade
    // public function test_update_grade_successfully()
    // {
    //     $user = User::factory()->create(); // Adjust this to your user model
    //     $this->actingAs($user);
    //     // Arrange: Create a grade to update
    //     $grade = Grade::factory()->create([
    //         'final_grade' => 75,
    //         'remarks' => 'Keep going!',
    //     ]);

    //     // Act: Update the grade through the API
    //     $response = $this->putJson(route('grades.updateGrade', ['gradeId' => $grade->id]), [
    //         'final_grade' => 85,
    //         'remarks' => 'Excellent progress!',
    //     ]);

    //     // Assert: Check if the grade is updated and the correct response is returned
    //     $response->assertStatus(200)
    //         ->assertJson([
    //             'final_grade' => 85,
    //             'remarks' => 'Excellent progress!',
    //         ]);
    // }

    // // Test for updating a grade with invalid data
    // public function test_update_grade_with_invalid_data()
    // {
    //     $user = User::factory()->create(); // Adjust this to your user model
    //     $this->actingAs($user);
    //     // Arrange: Create a grade to update
    //     $grade = Grade::factory()->create([
    //         'final_grade' => 75,
    //         'remarks' => 'Keep going!',
    //     ]);

    //     // Act: Try updating the grade with invalid final_grade (e.g., > 100)
    //     $response = $this->putJson(route('grades.updateGrade', ['gradeId' => $grade->id]), [
    //         'final_grade' => 110,  // Invalid grade
    //         'remarks' => 'Excellent progress!',
    //     ]);

    //     // Assert: Check if validation error is returned
    //     $response->assertStatus(422)
    //         ->assertJsonValidationErrors(['final_grade']);
    // }

    // // Test for filtering grades by remarks
    // public function test_filter_grades_by_remarks()
    // {
    //     $user = User::factory()->create(); // Adjust this to your user model
    //     $this->actingAs($user);
    //     // Arrange: Create grades with different remarks
    //     $class = CourseClass::factory()->create();
    //     $students = User::factory()->count(2)->create();
    //     foreach ($students as $student) {
    //         Grade::create([
    //             'class_id' => $class->id,
    //             'student_id' => $student->id,
    //             'final_grade' => rand(60, 100),
    //             'remarks' => 'Keep going!',
    //         ]);
    //     }
    //     Grade::create([
    //         'class_id' => $class->id,
    //         'student_id' => $students[0]->id,
    //         'final_grade' => 95,
    //         'remarks' => 'Excellent!',
    //     ]);

    //     // Act: Make a request to filter grades by a specific remark
    //     $response = $this->getJson(route('grades.fetchAllStudentGrade', ['classId' => $class->id]) . '?remarks=Excellent!');

    //     // Assert: Ensure the response only contains grades with the "Excellent!" remark
    //     $response->assertStatus(200)
    //         ->assertJsonCount(1, 'data') // Only one "Excellent!" grade
    //         ->assertJson([
    //             'data' => [
    //                 [
    //                     'remarks' => 'Excellent!',
    //                 ],
    //             ],
    //         ]);
    // }

    // // Test for paginated results
    // public function test_pagination_of_grades()
    // {
    //     $user = User::factory()->create(); // Adjust this to your user model
    //     $this->actingAs($user);
    //     // Arrange: Create enough grades to check pagination
    //     $class = CourseClass::factory()->create();
    //     $students = User::factory()->count(25)->create();
    //     foreach ($students as $student) {
    //         Grade::create([
    //             'class_id' => $class->id,
    //             'student_id' => $student->id,
    //             'final_grade' => rand(60, 100),
    //             'remarks' => "Good job!",
    //         ]);
    //     }

    //     // Act: Request the first page of grades
    //     $response = $this->getJson(route('grades.fetchAllStudentGrade', ['classId' => $class->id]) . '?page=1');

    //     // Assert: Ensure that the response contains 10 records, and pagination links are present
    //     $response->assertStatus(200)
    //         ->assertJsonCount(10, 'data')
    //         ->assertJsonStructure([
    //             'data' => [],
    //             'links',
    //             'meta',
    //         ]);
    // }
}

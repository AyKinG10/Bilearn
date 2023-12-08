<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Course;
use App\Http\Controllers\CourseController;

class CourseControllerTest extends TestCase
{

    use RefreshDatabase;

    /** @test */
    public function it_fetches_all_posts()
    {

        // Create a list of courses
        $courses = Course::factory()->count(5)->create();

        // Call the controller method
        $response = $this->get('/courses');

        // Check the response status and data
        $response->assertStatus(200);
        $response->assertViewHas('courses', $courses);
    }
}

<?php 

namespace App\Controllers;

use App\Services\CourseService;

class CourseController extends BaseController
{
    private $courseService;

    public function __construct() {
        $this->courseService = new CourseService();
    }

    public function index(?string $categoryId = null) {
        $this->sendJsonResponse($this->courseService->getAllCourses($categoryId));
    }

    public function getById(string $id) {
        $course = $this->courseService->getCourseByCategoryId($id);
        if ($course) {
            $this->sendJsonResponse($course);
        } else {
            $this->sendJsonResponse(['error' => 'Course not found'],404);
        }
    }
}
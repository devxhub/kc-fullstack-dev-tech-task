<?php 

namespace App\Controllers;

use App\Services\CourseService;

class CourseController {
    private $courseService;

    public function __construct() {
        $this->courseService = new CourseService();
    }

    public function index(?string $categoryId = null) {
        header("Access-Control-Allow-Origin: http://cc.localhost");
        header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
        header("Access-Control-Allow-Headers: Content-Type");
        header("Content-Type: application/json");
        echo json_encode($this->courseService->getAllCourses($categoryId));
    }

    public function getById(string $id) {
        header("Access-Control-Allow-Origin: http://cc.localhost");
        header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
        header("Access-Control-Allow-Headers: Content-Type");
        header("Content-Type: application/json");
        $course = $this->courseService->getCourseByCategoryId($id);
        if ($course) {
            echo json_encode($course);
        } else {
            http_response_code(404);
            echo json_encode(['error' => 'Course not found']);
        }
    }
}
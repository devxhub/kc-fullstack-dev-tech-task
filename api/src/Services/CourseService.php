<?php 

namespace App\Services;

use App\Database\CourseRepository;

class CourseService {
    private $courseRepository;

    public function __construct() {
        $this->courseRepository = new CourseRepository();
    }

    public function getAllCourses(?string $categoryId = null) {
        return $this->courseRepository->getAllCourses($categoryId);
    }

    public function getCourseByCategoryId(string $id) {
        return $this->courseRepository->getCourseByCategoryId($id);
    }
}
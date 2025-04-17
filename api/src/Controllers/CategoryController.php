<?php 

namespace App\Controllers;

use App\Services\CategoryService;

class CategoryController {
    private $categoryService;

    public function __construct() {
        $this->categoryService = new CategoryService();
    }

    public function index() {
        header("Access-Control-Allow-Origin: http://cc.localhost");
        header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
        header("Access-Control-Allow-Headers: Content-Type");
        header("Content-Type: application/json");
        echo json_encode($this->categoryService->getAllCategoriesWithCourseCount());
    }

    public function getById(string $id) {
         header("Access-Control-Allow-Origin: http://cc.localhost");
         header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
         header("Access-Control-Allow-Headers: Content-Type");
         header("Content-Type: application/json");
        $category = $this->categoryService->getCategoryById($id);
        if ($category) {
            echo json_encode($category);
        } else {
            http_response_code(404);
            echo json_encode(['error' => 'Category not found']);
        }
    }
}
<?php 

namespace App\Controllers;

use App\Services\CategoryService;

class CategoryController extends BaseController 
{
    private $categoryService;

    public function __construct() {
        $this->categoryService = new CategoryService();
    }

    public function index() {
        $this->sendJsonResponse($this->categoryService->getAllCategoriesWithCourseCount());
    }

    public function getById(string $id) {
        $category = $this->categoryService->getCategoryById($id);
        if ($category) {
            $this->sendJsonResponse($category);
        } else {
            $this->sendJsonResponse(['error' => 'Category not found'],404);
        }
    }
}
<?php 

namespace App\Services;

use App\Database\CategoryRepository;

class CategoryService {
    private $categoryRepository;

    public function __construct() {
        $this->categoryRepository = new CategoryRepository();
    }

    public function getAllCategoriesWithCourseCount() {
        $categories = $this->categoryRepository->getAllCategories();
        return $categories;
    }

    public function getCategoryById(string $id) {
        $category = $this->categoryRepository->getCategoryById($id);
        return $category;
    }

    public function getAllCategories() {
        return $this->categoryRepository->getAllCategories();
    }

}
<?php 

namespace App\Database;

use PDO;

class CategoryRepository {
    private $pdo;

    public function __construct() {
        $this->pdo = Database::getInstance();
    }

    public function getAllCategories() {
        $stmt = $this->pdo->prepare("SELECT c.id,c.parent_id,c.name,( SELECT COUNT(*) 
                FROM courses 
                WHERE courses.category_id = c.id
            ) AS count_of_courses
        FROM categories c
        ORDER BY c.name
    ");
        $stmt->execute();
        $categories = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
        
        $categoryMap = [];
        foreach ($categories as $category) {
            $category['children'] = [];
            $categoryMap[$category['id']] = $category;
        }
    
        
        $tree = [];
        foreach ($categoryMap as $id => &$category) {
            if ($category['parent_id']) {
                $categoryMap[$category['parent_id']]['children'][] = &$category;
            } else {
                $tree[] = &$category;
            }
        }
    
        return $tree;
    }

    public function getCategoryById(string $id) {
        $stmt = $this->pdo->prepare("SELECT id, name, description, parent_id, created_at, updated_at FROM categories WHERE id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
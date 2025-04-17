<?php 

namespace App\Database;

use PDO;

class CourseRepository {
    private $pdo;

    public function __construct() {
        $this->pdo = Database::getInstance();
    }

    public function getAllCourses(?string $categoryId = null) {
        $sql = "
            WITH RECURSIVE cat_tree AS (
                SELECT 
                    id,
                    parent_id,
                    name,
                    id AS root_id,
                    name AS root_name
                FROM categories
                WHERE parent_id IS NULL
    
                UNION ALL
    
                SELECT 
                    c.id,
                    c.parent_id,
                    c.name,
                    ct.root_id,
                    ct.root_name
                FROM categories c
                JOIN cat_tree ct ON c.parent_id = ct.id
            )
            SELECT 
                courses.id,
                courses.title,
                courses.description,
                courses.image_preview,
                ct.root_name AS main_category_name,
                courses.created_at,
                courses.updated_at
            FROM courses
            JOIN cat_tree ct ON courses.category_id = ct.id
        ";
    
        if ($categoryId) {
            $sql .= " WHERE courses.category_id = :category_id";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindParam(':category_id', $categoryId);
            $stmt->execute();
        } else {
            $stmt = $this->pdo->query($sql);
        }
    
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    

    public function getCourseByCategoryId(string $id) {
        $stmt = $this->pdo->prepare("WITH RECURSIVE cat_tree AS (
                SELECT 
                    id,
                    parent_id,
                    name,
                    id AS root_id,
                    name AS root_name
                FROM categories
                WHERE parent_id IS NULL
    
                UNION ALL
    
                SELECT 
                    c.id,
                    c.parent_id,
                    c.name,
                    ct.root_id,
                    ct.root_name
                FROM categories c
                JOIN cat_tree ct ON c.parent_id = ct.id
            )
            SELECT 
                courses.id,
                courses.title,
                courses.description,
                courses.image_preview,
                ct.root_name AS main_category_name,
                courses.created_at,
                courses.updated_at
            FROM courses
            JOIN cat_tree ct ON courses.category_id = ct.id
                                     WHERE courses.category_id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}

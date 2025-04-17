<?php

use App\Controllers\CategoryController;
use App\Controllers\CourseController;

function dispatch(string $uri, string $method) {
    $uri = rtrim($uri, '/');
    if ($uri === '/categories' && $method === 'GET') {
        $controller = new CategoryController();
        $controller->index();
    } elseif (preg_match('#^/categories/([a-f0-9-]+)$#', $uri, $matches) && $method === 'GET') {
        $controller = new CategoryController();
        $controller->getById($matches[1]);
    }
     elseif ($uri === '/courses' && $method === 'GET') {
        $controller = new CourseController();
        $controller->index();
    } 
    elseif (preg_match('#^/courses/([a-f0-9-]+)$#', $uri, $matches) && $method === 'GET') {
        $controller = new CourseController();
        $controller->getById($matches[1]);
    }
     else {
        http_response_code(404);
        echo json_encode(['error' => 'Not Found']);
    }
}

?>
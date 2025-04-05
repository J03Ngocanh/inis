<?php
class Controller {
    public function model($model) {
        $modelPath = dirname(__DIR__) . '/app/models/' . $model . '.php';
        if (file_exists($modelPath)) {
            require_once $modelPath;
            return new $model();
        } else {
            die("Không tìm thấy model: $modelPath");
        }
    }

    public function view($view, $data = NULL) {
        if (is_array($data)) {
            // Chuyển đổi các khóa của mảng $data thành các biến
            extract($data);
        }
        $viewPath = dirname(__DIR__) . '/app/views/' . $view . '.php';
        if (file_exists($viewPath)) {
            require_once $viewPath;
        } else {
            die("Không tìm thấy view: $viewPath");
        }
    }
}
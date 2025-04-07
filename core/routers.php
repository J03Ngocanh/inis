<?php

class Router {
    protected $controller = 'trangchuController';
    protected $action = 'trangchu';
    protected $params = [];

    private function parseUrl($uri) {
        $uri = str_replace(WEBROOT, '', $uri); // Loại bỏ WEBROOT (ví dụ: /inis/)
        // Chỉ lấy phần path, loại bỏ query string nếu có
        $path = parse_url($uri, PHP_URL_PATH);
        return explode('/', filter_var(rtrim($path, '/'), FILTER_SANITIZE_URL));
    }

    public function dispatch($uri) {
        $url = $this->parseUrl($uri);

        // Kiểm tra controller
        if (isset($url[0]) && !empty($url[0])) {
            $controllerName = strtolower($url[0]) . 'Controller';
            $controllerPath = 'app/Controllers/' . $controllerName . '.php';
            if (file_exists($controllerPath)) {
                $this->controller = $controllerName;
                unset($url[0]);
            }
        }

        // Tải controller
        $controllerPath = 'app/Controllers/' . $this->controller . '.php';
        if (!file_exists($controllerPath)) {
            die("Không tìm thấy controller: $controllerPath");
        }

        require_once $controllerPath;
        $this->controller = new $this->controller;

        // Kiểm tra action
        if (isset($url[1]) && method_exists($this->controller, $url[1])) {
            $this->action = $url[1];
            unset($url[1]);
        }

        // Gán params từ path
        $pathParams = $url ? array_values($url) : [];

        // Lấy query string params từ $_GET
        $queryParams = $_GET;

        // Nếu có query params, gộp nó vào path params để truyền như một mảng phẳng
        if (!empty($queryParams)) {
            $this->params = array_merge($pathParams, [$queryParams]);
        } else {
            $this->params = $pathParams;
        }

        // Gọi action với params
        call_user_func_array([$this->controller, $this->action], $this->params);
    }
}
?>
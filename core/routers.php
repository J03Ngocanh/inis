<?php

    class Router {
        protected $controller = 'homcontroller';
        protected $action = 'trangchu';
        protected $params = [];
        
        private function parseUrl($uri) {
            //echo "Chuỗi URI:";
            //var_dump(explode('/', filter_var(rtrim($uri, '/'), FILTER_SANITIZE_URL)));
            return explode('/', filter_var(rtrim($uri, '/'), FILTER_SANITIZE_URL));
        }
        public function dispatch($uri) {
            $url = $this->parseUrl($uri);
            if(file_exists('app/Controllers/' . $url[2] . 'Controller.php')) {
                $this->controller = ucfirst($url[2]) . 'Controller';
                //echo  "$this->controller:".$this->controller;
                unset($url[2]);
            }
            
          //  echo "Controller:".$this->controller."<br>";
            require_once 'app/Controllers/' . $this->controller . '.php';
            
            $this->controller = new $this->controller;
            
            if(isset($url[3])) {
                if(method_exists($this->controller, $url[3])) {
                    $this->action = $url[3];
                    unset($url[3]);
                }
            }
           // echo "Action:".$this->action."<br>";;
            unset($url[0]);
            unset($url[1]);
            //echo "parameters:";
            $this->params = $url ? array_values($url) : [];
            //var_dump($this->params);

           call_user_func_array([$this->controller, $this->action], $this->params); 
           
        } 
        

        
    }
?>
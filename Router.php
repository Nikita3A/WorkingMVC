<?php
namespace app;
use app\controllers\MainController;

class Router
{
    public array $getRoutes = [];
    public array $postRoutes = [];
    public Database $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function get($url, $fn)
    {
        $this->getRoutes[$url] = $fn;
    }

    public function post($url, $fn)
    {
        $this->postRoutes[$url] = $fn;
    }

    public function resolve()
    {
        $method = strtolower($_SERVER['REQUEST_METHOD']);
        $url = $_SERVER['PATH_INFO'] ?? '/';

        if ($method === 'get') {
            $fn = $this->getRoutes[$url] ?? null;
        } else {
            $fn = $this->postRoutes[$url] ?? null;
        }

        /*
         Content of $fn[0] is "app\controllers\MainController"
         Content if fn[1] is name of method
        */

        if (!$fn) {
            echo 'Page not found';
            exit;
        }
        // My solution /////////////////////////////////
        $controller = new MainController(); 
        echo call_user_func(array($controller, $fn[1]), $this);
        //////////////////////////////////////////////////
        //echo call_user_func($fn); This is don't work. I don't know why


    }

    public function renderView($view, $params = [])
    {
        foreach ($params as $key => $value)
        {
            $$key = $value; 
        }

        ob_start();
        include __DIR__."/views/$view.php";
        $content = ob_get_clean();
        include __DIR__."/views/_layout.php";
    }
}
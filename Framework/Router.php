<?php
namespace Framework;
use App\Controllers\ErrorController;

class Router {
    protected $routes = [];

    public function registerRoute($method, $uri, $action) {
        list($controller, $controllerMethod) = explode('@', $action);

        $this->routes[] = [
            'method' => $method,
            'uri' => $uri,
            'controller' => $controller,
            'controllerMethod' => $controllerMethod
        ];
    }

    // get routes
    public function get($uri, $controller) {
        $this->registerRoute('GET', $uri, $controller);
    }

    // post routes
    public function post($uri, $controller) {
        $this->registerRoute('POST', $uri, $controller);
    }
    
    public function route($uri) {
        $requestMethod = $_SERVER['REQUEST_METHOD'];

        foreach($this->routes as $route) {
            $uriSegements = explode('/', trim($uri, '/'));
            $routeSegments = explode('/', trim($route['uri'], '/'));
            $params = [];
            $match = true;

            // check if the uri and request method match
            if(count($uriSegements) === count($routeSegments) && strtoupper($requestMethod === $route['method'])) {
                for($i = 0; $i < count($uriSegements); $i++) {
                    if($uriSegements[$i] !== $routeSegments[$i] && !preg_match('/\{(.+?)\}/', $routeSegments[$i])) {
                        $match = false;
                        break;
                    }
                    // check if an id matches
                    if(preg_match('/\{(.+?)\}/', $routeSegments[$i], $matches)) {
                        $params[$matches[1]] = $uriSegements[$i];
                        //inspectAndDie($params);
                    }
                }

                if ($match) {
                    $controller = 'App\\controllers\\' . $route['controller'];
                    $controllerMethod = $route['controllerMethod'];
          
                    // Instatiate the controller and call the method
                    $controllerInstance = new $controller();
                    $controllerInstance->$controllerMethod($params);
                    return;
                  }
            }

        }
        ErrorController::notFound();
    }
}
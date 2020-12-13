<?php


class Route{

    /**
     * @var array $httErrors Http errors array
     */
    public static $httErrors = [
        '404' => [
            'header' => 'HTTP/1.1 404 Not Found',
            'text' => '404 Not Found!'
        ],
        '403' => [
            'header' => 'HTTP/1.0 403 Forbidden',
            'text' => 'You are forbidden!'
        ]
    ];

    public const DEFAULT_CONTROLLER = "HomeController";
    public const DEFAULT_ACTION = "index";
    public const DEFAULT_PARAMS = [];

    /*
     * Initialize routing
     */
    public static function init(){

        $routes = self::getRoutes($_GET, $_POST);

        $controllerFilename = $routes['controller'].'.php';

        $controllerPath = $_SERVER['DOCUMENT_ROOT'].'/App/Controllers/'.$controllerFilename;

        if(file_exists($controllerPath))
            include_once $controllerPath;
        else
            Route::abort(404);

        /*
         * Create controller object
         */
        $controllerObject = new $routes['controller'];

        if(method_exists($controllerObject, $routes['action']))
            /*
             * Action controller method with params
             */
            $controllerObject->{$routes['action']}($routes['params']);
        else
            Route::abort(404);

    }

    /*
     * Abort with error code
     */
    public static function abort($code){
        if(isset(self::$httErrors[$code]))
            header(self::$httErrors[$code]['header'], true, $code);
        exit();
    }

    /*
     * Get Controller method params
     */
    public static function getParams($getArray){
        $params = [];

        if(isset($getArray[2]))
            for ($paramIndex = 2; $paramIndex < count($getArray); $paramIndex++)
                if($paramIndex % 2 == 0)
                    $params[$getArray[$paramIndex]] = isset($getArray[$paramIndex + 1]) ? $getArray[$paramIndex + 1] : '';

        return $params;
    }


    /*
     * Parce request str
     */
    public static function parceRequest($getStr){

        $getArray = explode('/', $getStr);

        $routes = [
            'controller' => isset($getArray[0]) ? ucfirst($getArray[0])."Controller" : self::DEFAULT_CONTROLLER,
            'action' => isset($getArray[1]) ? $getArray[1] : self::DEFAULT_ACTION,
            'params' => self::getParams($getArray)
        ];

        return $routes;
    }

    /*
     * Get Controller Action and params by request input
     */
    public static function getRoutes( $getRequest, $postRequest ){

        /*
         * Default controller with action and params
         */
        $routes = [
            'controller' => self::DEFAULT_CONTROLLER,
            'action' => self::DEFAULT_ACTION,
            'params' => self::DEFAULT_PARAMS
        ];

        if(count($getRequest)){

            /*
             * Delete first get array item
             */
            array_shift($getRequest);

            /*
             * Set get controller with action and params
             */
            if(count($getRequest)){
                $routes = array_keys($getRequest);
                $routes = self::parceRequest(array_shift($routes));
            }

            /*
             * Set post action and params
             */
            if(isset($postRequest) && count($postRequest)){
                $routes['action'] = 'post'.ucfirst($routes['action']);
                $routes['params']['post'] = $postRequest;
            }

        }

        return $routes;
    }

}
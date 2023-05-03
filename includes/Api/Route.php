<?php

namespace Wp\Easyrestapi\Api;

class Route
{

    /**
     * Routes uri here
     * @var array
     * @since 1.0.0
     */
    private static array $routes = [];

    /**
     * Route prefix
     * @var string
     * @since 1.0.0
     */
    private static string $prefix = "easyrestapi";

    public function __construct()
    {
        require_once plugin_dir_path(__FILE__)."routes.php";
    }//end of constructor

    /**
     * Initialize WP rest hooks for rest api
     *
     * @since 1.0.0
     */
    public function init()
    {
        foreach (self::$routes as $route) {
            register_rest_route($route["namespace"],
                $route["uri"], [
                    [
                        'methods'             => $route["method"],
                        'callback'            => $route["action"],
                        'permission_callback' => '__return_true'
                    ]
                ]
            );
        }
    }//end method init

    /**
     * Rest API prefix Set
     *
     * @param $prefix
     *
     * @return static
     * @since 1.0.0
     */
    public static function prefix($prefix)
    {
        self::$prefix = $prefix;

        return new static();
    }//end method prefix

    /**
     * Rest API get route
     *
     * @param $uri
     * @param  array  $action
     *
     * @return Route
     * @since 1.0.0
     */
    public static function get($uri, $action = [])
    {
        // set routes
        self::setRoutes("GET", $uri, $action);

        return new static();

    }//end method get

    /**
     * Rest API post route
     *
     * @param $uri
     * @param  array  $action
     *
     * @return Route
     * @since 1.0.0
     */
    public static function post($uri, $action = [])
    {
        // set routes
        self::setRoutes("POST", $uri, $action);

        return new static();
    }//end method post

    /**
     * Set Routes
     *
     * @param  string  $method
     * @param  string  $uri
     * @param  array  $action
     *
     * @since 1.0.0
     */
    private static function setRoutes($method, $uri, $action = [])
    {
        $className  = $action[0];
        $methodName = $action[1];

        // create class instance
        $classInstance = new $className();

        static::$routes[] = [
            "namespace" => self::$prefix,
            "method"    => $method,
            "uri"       => $uri,
            "action"    => [$classInstance, $methodName],
        ];
    }//end method setRoutes

}
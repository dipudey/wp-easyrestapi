<?php

namespace Wp\Easyrestapi;

use Wp\Easyrestapi\Api\Route;

class EasyRestApi
{
    /**
     * The single instance of the class.
     *
     * @var self
     * @since  1.0.0
     */
    private static $instance = null;

    public function __construct()
    {
        $route = new Route();
        add_action( 'rest_api_init', [ $route, 'init' ] );
    }

    /**
     * Main Instance.
     *
     * @return self Main instance.
     * @since  1.0.0
     * @static
     */
    public static function instance()
    {
        if (is_null(self::$instance)) {
            self::$instance = new self();
        }

        return self::$instance;
    }

}
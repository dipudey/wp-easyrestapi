<?php

namespace Wp\Easyrestapi\Services;

class TestService
{
    public function testApi()
    {
        $response = new \WP_REST_Response();
        $response->set_data([
            'success' => true,
            "data"    => [
                "name"    => "Dipu Chandra Dey",
                "website" => "https://diudey.com"
            ]
        ]);

        $response->set_status(200);

        return $response;
    }
}
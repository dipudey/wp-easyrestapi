<?php

use \Wp\Easyrestapi\Api\Route;
use \Wp\Easyrestapi\Services\TestService;


Route::prefix("easyrestapi/v1")->get("test", [TestService::class, "testApi"]);
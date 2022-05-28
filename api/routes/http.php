<?php

use Slim\App;
use App\Http\Error\NotFound;

/**
 * @param App $app
 *
 * @return void
 */
return static function (App $app): void {

    $app->any('/{path:.*}', NotFound::class);
};

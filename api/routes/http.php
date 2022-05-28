<?php

use App\Http\Info\HealtcheckAction;
use Slim\App;
use App\Http\Error\NotFound;

/**
 * @param App $app
 *
 * @return void
 */
return static function (App $app): void {
    $app->get('/healthcheck', HealtcheckAction::class);

    $app->any('/{path:.*}', NotFound::class);
};

<?php
/**
 * This file is part of Notadd.
 *
 * @copyright (c) 2017, iBenchu.org
 * @datetime 2017-02-23 19:42
 */
namespace Notadd\Slide\Listeners;

use Notadd\Slide\Controllers\CategoryController;
use Notadd\Slide\Controllers\SlideController;
use Notadd\Foundation\Routing\Abstracts\RouteRegister as AbstractRouteRegister;

/**
 * Class RouteRegister.
 */
class RouteRegister extends AbstractRouteRegister
{
    /**
     * Handle Route Register.
     */
    public function handle()
    {
        $this->router->group(['middleware' => ['cross', 'web'], 'prefix' => 'api/slide'], function () {
            $this->router->get('index', SlideController::class . '@index');
        });

        $this->router->group(['middleware' => ['cross', 'web'], 'prefix' => 'api/slide/category'],function() {
            $this->router->get('edit', CategoryController::class.'@getEdit');
            $this->router->post('edit', CategoryController::class.'@postEdit');
            $this->router->post('delete', CategoryController::class.'@postDelete');
        })
    }
}

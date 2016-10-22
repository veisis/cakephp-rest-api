<?php

/*
 * bootstrap
 */

use Cake\Core\Configure;
use Cake\Event\EventManager;
use RestApi\Event\ApiRequestHandler;

// Set custom exception renderer
Configure::write('Error.exceptionRenderer', 'RestApi\Error\AppExceptionRenderer');

// Register listner
EventManager::instance()->on(new ApiRequestHandler());


/*
 * Read configuration file and inject configuration
 */
try {
    Configure::load('RestApi.api', 'default', false);
    Configure::load('api', 'default', true);
} catch (\Exception $e) {

}
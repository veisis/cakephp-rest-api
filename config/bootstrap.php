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

<?php

/*
 * bootstrap
 */

use Cake\Core\Configure;
use Cake\Event\EventManager;

// Set custom exception renderer
Configure::write('Error.exceptionRenderer', 'RestApi\Error\AppExceptionRenderer');

/*
 * Read configuration file and inject configuration
 */
try {
    Configure::load('RestApi.api', 'default', false);
    Configure::load('api', 'default', true);
} catch (\Exception $e) {

}
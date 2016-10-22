<?php

/*
 * bootstrap
 */

use Cake\Core\Configure;

// Set custom exception renderer
Configure::write('Error.exceptionRenderer', 'RestApi\Error\ApiExceptionRenderer');

/*
 * Read configuration file and inject configuration
 */
try {
    Configure::load('RestApi.api', 'default', false);
    Configure::load('api', 'default', true);
} catch (Exception $e) {
    // nothing
}

<?php

namespace RestApi\Controller;

use Cake\Controller\Controller;

/**
 * Application Controller
 *
 */
class AppController extends Controller
{

    /**
     * HTTP Status Code
     *
     * @var int
     */
    public $httpStatusCode = 200;

    /**
     * Status value in API response
     *
     * @var string
     */
    public $responseStatus = "OK";

    /**
     * API response data
     *
     * @var array
     */
    public $apiResponse = [];

    /**
     * Initialization hook method.
     *
     * @return void
     */
    public function initialize()
    {
        parent::initialize();

        $this->loadComponent('RequestHandler');
    }
}

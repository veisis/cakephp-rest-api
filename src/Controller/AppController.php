<?php

namespace RestApi\Controller;

use Cake\Controller\Controller;
use Cake\Core\Configure;
use Cake\Event\Event;

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
        $this->_buildResponse();
    }

    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);

        if ('OPTIONS' === $this->request->method()) {
            $this->response->statusCode(200);

            return $this->response;
        }
    }

    public function afterFilter(Event $event)
    {
        // TODO: log request
        parent::afterFilter($event);
    }

    /**
     * Prepares the response object with content type and cors headers.
     *
     * @param Event $event The event object either beforeDispatch or afterDispatch
     *
     * @return bool true
     */
    private function _buildResponse()
    {
        $this->response->type('json');

        if (Configure::read('ApiRequest.cors.enabled')) {
            $this->response->cors($this->request)
                ->allowOrigin(Configure::read('ApiRequest.cors.origin'))
                ->allowMethods(['GET', 'POST', 'OPTIONS'])
                ->allowHeaders(['Content-Type, Authorization, Accept, Origin'])
                ->allowCredentials()
                ->maxAge(2628000)
                ->build();
        }

        return true;
    }
}

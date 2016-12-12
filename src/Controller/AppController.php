<?php

namespace RestApi\Controller;

use Cake\Controller\Controller;
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
     * payload value from JWT token
     *
     * @var mixed
     */
    public $jwtPayload = null;

    /**
     * JWT token for current request
     *
     * @var string
     */
    public $jwtToken = "";

    /**
     * Initialization hook method.
     *
     * @return void
     */
    public function initialize()
    {
        parent::initialize();

        $this->loadComponent('RequestHandler');
        $this->loadComponent('RestApi.AccessControl');
    }

    /**
     * Before render callback.
     *
     * @param Event $event The beforeRender event.
     * @return \Cake\Network\Response|null
     */
    public function beforeRender(Event $event)
    {
        parent::beforeRender($event);

        $this->response->statusCode($this->httpStatusCode);

        if (200 != $this->httpStatusCode) {
            $this->responseStatus = "NOK";
        }

        $response = [
            'status' => $this->responseStatus
        ];

        if (!empty($this->apiResponse)) {
            $response['result'] = $this->apiResponse;
        }

        $this->set('response', $response);

        return null;
    }
}

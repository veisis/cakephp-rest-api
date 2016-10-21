<?php

namespace RestApi\Controller;

use Cake\Event\Event;

/**
 * Static content controller
 *
 * This controller will render errors
 */
class ApiErrorController extends AppController
{

    /**
     * Initialization hook method.
     *
     * @return void
     */
    public function initialize()
    {
        $this->loadComponent('RequestHandler');
    }

    /**
     * beforeRender callback.
     *
     * @param Event $event Event.
     * @return void
     */
    public function beforeRender(Event $event)
    {
        $this->httpStatusCode = $this->response->statusCode();

        $messageArr = $this->response->httpCodes($this->httpStatusCode);

        $this->apiResponse['message'] = !empty($messageArr[$this->httpStatusCode]) ? $messageArr[$this->httpStatusCode] : 'Unknown error!';

        parent::beforeRender($event);

        $this->viewBuilder()->className('RestApi.ApiError');
    }
}

<?php

namespace RestApi\Controller;

use Cake\Event\Event;

class ApiController extends AppController
{

    /**
     * Before render callback.
     *
     * @param Event $event The beforeRender event.
     * @return void
     */
    public function beforeRender(Event $event)
    {
        parent::beforeRender($event);

        $this->viewBuilder()->className('RestApi.Api');

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
    }
}

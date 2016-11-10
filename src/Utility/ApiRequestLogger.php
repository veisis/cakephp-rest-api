<?php

namespace RestApi\Utility;

use Cake\Core\Configure;
use Cake\Network\Request;
use Cake\Network\Response;
use Cake\ORM\TableRegistry;

/**
 * Handles the request logging.
 */
class ApiRequestLogger
{

    /**
     * Logs the request and response data into database.
     *
     * @param Request  $request  The \Cake\Network\Request object
     * @param Response $response The \Cake\Network\Response object
     */
    public static function log(Request $request, Response $response)
    {
        if (!Configure::read('ApiRequest.log')) {
            return;
        }

        Configure::write('requestLogged', true);

        try {
            $apiRequests = TableRegistry::get('ApiRequests');
            $entityData = [
                'http_method' => $request->method(),
                'endpoint' => $request->here(),
                'user_id' => Configure::read('currentUserId'),
                'token' => Configure::read('accessToken'),
                'ip_address' => $request->clientIp(),
                'request_data' => json_encode($request->data),
                'response_code' => $response->statusCode(),
                'response_data' => $response->body(),
                'exception' => Configure::read('exceptionMessage'),
            ];
            $entity = $apiRequests->newEntity($entityData);
            $apiRequests->save($entity);
        } catch (\Exception $e) {
            return;
        }
    }
}

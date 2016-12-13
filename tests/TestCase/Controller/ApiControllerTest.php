<?php

namespace RestApi\Test\TestCase\Controller;

use Cake\Event\Event;
use Cake\Network\Request;
use Cake\Network\Response;
use Cake\Routing\RouteBuilder;
use Cake\Routing\Router;
use Cake\TestSuite\IntegrationTestCase;

/**
 * RestApi\Controller\ApiController Test Case
 */
class ApiControllerTest extends IntegrationTestCase
{

    public $controller = null;

    /**
     * Setup method.
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $request = new Request();
        $response = new Response();
        $this->controller = $this->getMockBuilder('RestApi\Controller\ApiController')
            ->setConstructorArgs([$request, $response])
            ->setMethods(null)
            ->getMock();

        Router::plugin('RestApi', function (RouteBuilder $routes) {
            $routes->connect(
                '/foo/public-action', ['plugin' => 'RestApi', 'controller' => 'Foo', 'action' => 'publicAction']
            );
        });
    }

    /**
     * Test beforeRender method
     *
     * @return void
     */
    public function testBeforeRender()
    {
        $this->controller->beforeRender(new Event('Controller.beforeRender'));
        $viewClass = $this->controller->viewBuilder()->className();
        $this->assertEquals('RestApi.Api', $viewClass);
    }

    /**
     * Test response data
     *
     * @return void
     */
    public function testResponseData()
    {
        $this->controller->beforeRender(new Event('Controller.beforeRender'));

        $this->assertNotEmpty($this->controller->httpStatusCode);
        $this->assertNotEmpty($this->controller->responseStatus);
        $this->assertContains($this->controller->responseStatus, ['OK', 'NOK']);
    }

    public function testFooAction()
    {
        /* it should call foo/public-action endpoint from TestApp/FooController
         * and match the resulting json response
         */
//        $this->get('/test_app/foo/public-action');
//        debug($this->get('/foo/public-action'));
    }
}

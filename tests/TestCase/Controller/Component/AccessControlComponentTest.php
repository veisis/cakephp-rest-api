<?php

namespace RestApi\Test\TestCase\Controller\Component;

use Cake\Controller\ComponentRegistry;
use Cake\Core\Configure;
use Cake\Event\Event;
use Cake\Network\Request;
use Cake\Network\Response;
use Cake\TestSuite\TestCase;
use RestApi\Controller\Component\AccessControlComponent;

/**
 * RestApi\Controller\Component\AccessControlComponent Test Case
 */
class AccessControlComponentTest extends TestCase
{

    /**
     *
     * @var AccessControlComponent
     */
    public $AccessControlComponent;

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();

        $request = new Request();
        $response = new Response();
        $this->controller = $this->getMockBuilder('TestApp\Controller\FooController')
            ->setConstructorArgs([$request, $response])
            ->setMethods(null)
            ->getMock();

        $registry = new ComponentRegistry($this->controller);
        $this->AccessControlComponent = new AccessControlComponent($registry);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->AccessControlComponent);

        parent::tearDown();
    }

    /**
     * Test startup method
     *
     * @return void
     */
    public function testStartup()
    {
        $config = [
            'log' => false,
            'jwtAuth' => [
                'enabled' => true,
                'cypherKey' => 'R1a#2%dY2fX@3g8r5&s4Kf6*sd(5dHs!5gD4s',
                'tokenAlgorithm' => 'HS256'
            ],
            'cors' => [
                'enabled' => true,
                'origin' => '*',
                'allowedMethods' => ['GET', 'POST', 'OPTIONS'],
                'allowedHeaders' => ['Content-Type, Authorization, Accept, Origin'],
                'maxAge' => 2628000
            ]
        ];
        Configure::write('ApiRequest', $config);

        $this->setExpectedException('RestApi\Routing\Exception\MissingTokenException');

        $event = new Event('Controller.startup', $this->controller);
        $this->assertEquals($this->AccessControlComponent->startup($event), true);
    }

    public function testPublicAction()
    {
        $config = [
            'jwtAuth' => [
                'enabled' => false
            ]
        ];
        Configure::write('ApiRequest', $config);

        $event = new Event('Controller.startup', $this->controller);
        $this->assertEquals($this->AccessControlComponent->startup($event), true);
    }
}

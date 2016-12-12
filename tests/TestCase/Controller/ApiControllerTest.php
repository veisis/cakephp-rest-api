<?php
namespace RestApi\Test\TestCase\Controller;

use Cake\TestSuite\IntegrationTestCase;
use RestApi\Controller\ApiController;

/**
 * RestApi\Controller\ApiController Test Case
 */
class ApiControllerTest extends IntegrationTestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'plugin.rest_api.api'
    ];

    /**
     * Test beforeRender method
     *
     * @return void
     */
    public function testBeforeRender()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}

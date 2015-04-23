<?php
namespace App\Test\TestCase\Controller;

use App\Controller\LeasesController;
use Cake\TestSuite\IntegrationTestCase;

/**
 * App\Controller\LeasesController Test Case
 */
class LeasesControllerTest extends IntegrationTestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'Leases' => 'app.leases',
        'Rooms' => 'app.rooms',
        'Students' => 'app.students',
        'InternetConnection' => 'app.internet_connection',
        'Payments' => 'app.payments'
    ];

    /**
     * Test index method
     *
     * @return void
     */
    public function testIndex()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test view method
     *
     * @return void
     */
    public function testView()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test add method
     *
     * @return void
     */
    public function testAdd()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test edit method
     *
     * @return void
     */
    public function testEdit()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test delete method
     *
     * @return void
     */
    public function testDelete()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}

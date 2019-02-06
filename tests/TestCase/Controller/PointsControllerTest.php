<?php
namespace App\Test\TestCase\Controller;

use App\Controller\PointsController;
use Cake\TestSuite\IntegrationTestCase;

/**
 * App\Controller\PointsController Test Case
 */
class PointsControllerTest extends IntegrationTestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.points',
        'app.paiements',
        'app.reservations',
        'app.offres',
        'app.secteurs',
        'app.fournisseurs',
        'app.users',
        'app.roles',
        'app.categories',
        'app.clients',
        'app.clients_offres'
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

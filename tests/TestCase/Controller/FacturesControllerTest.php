<?php
namespace App\Test\TestCase\Controller;

use App\Controller\FacturesController;
use Cake\TestSuite\IntegrationTestCase;

/**
 * App\Controller\FacturesController Test Case
 */
class FacturesControllerTest extends IntegrationTestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.factures',
        'app.fournisseurs',
        'app.secteurs',
        'app.offres',
        'app.categories',
        'app.fournisseurs_segments',
        'app.segments',
        'app.users',
        'app.roles',
        'app.points',
        'app.paiements',
        'app.reservations',
        'app.orders',
        'app.payers',
        'app.servers',
        'app.ordersitems',
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

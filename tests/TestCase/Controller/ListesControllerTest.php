<?php
namespace App\Test\TestCase\Controller;

use App\Controller\ListesController;
use Cake\TestSuite\IntegrationTestCase;

/**
 * App\Controller\ListesController Test Case
 */
class ListesControllerTest extends IntegrationTestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.listes',
        'app.fournisseurs',
        'app.offres',
        'app.categories',
        'app.categories_offres',
        'app.users',
        'app.roles',
        'app.points',
        'app.paiements',
        'app.factures',
        'app.orders',
        'app.payers',
        'app.servers',
        'app.ordersitems',
        'app.reservations',
        'app.segments',
        'app.fournisseurs_segments',
        'app.listeitems'
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

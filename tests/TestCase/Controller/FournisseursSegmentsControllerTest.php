<?php
namespace App\Test\TestCase\Controller;

use App\Controller\FournisseursSegmentsController;
use Cake\TestSuite\IntegrationTestCase;

/**
 * App\Controller\FournisseursSegmentsController Test Case
 */
class FournisseursSegmentsControllerTest extends IntegrationTestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.fournisseurs_segments',
        'app.fournisseurs',
        'app.secteurs',
        'app.offres',
        'app.categories',
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
        'app.clients_offres',
        'app.segments'
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

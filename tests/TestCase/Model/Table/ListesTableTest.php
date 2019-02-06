<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ListesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ListesTable Test Case
 */
class ListesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ListesTable
     */
    public $Listes;

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
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Listes') ? [] : ['className' => 'App\Model\Table\ListesTable'];
        $this->Listes = TableRegistry::get('Listes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Listes);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}

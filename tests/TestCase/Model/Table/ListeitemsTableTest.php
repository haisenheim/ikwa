<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ListeitemsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ListeitemsTable Test Case
 */
class ListeitemsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ListeitemsTable
     */
    public $Listeitems;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.listeitems',
        'app.offres',
        'app.categories',
        'app.categories_offres',
        'app.fournisseurs',
        'app.orders',
        'app.users',
        'app.roles',
        'app.points',
        'app.paiements',
        'app.factures',
        'app.reservations',
        'app.payers',
        'app.servers',
        'app.ordersitems',
        'app.segments',
        'app.fournisseurs_segments',
        'app.listes'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Listeitems') ? [] : ['className' => 'App\Model\Table\ListeitemsTable'];
        $this->Listeitems = TableRegistry::get('Listeitems', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Listeitems);

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

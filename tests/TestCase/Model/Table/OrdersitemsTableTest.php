<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\OrdersitemsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\OrdersitemsTable Test Case
 */
class OrdersitemsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\OrdersitemsTable
     */
    public $Ordersitems;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.ordersitems',
        'app.orders',
        'app.offres'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Ordersitems') ? [] : ['className' => OrdersitemsTable::class];
        $this->Ordersitems = TableRegistry::getTableLocator()->get('Ordersitems', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Ordersitems);

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

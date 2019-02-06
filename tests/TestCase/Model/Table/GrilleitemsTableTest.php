<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\GrilleitemsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\GrilleitemsTable Test Case
 */
class GrilleitemsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\GrilleitemsTable
     */
    public $Grilleitems;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.grilleitems',
        'app.grilles'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Grilleitems') ? [] : ['className' => GrilleitemsTable::class];
        $this->Grilleitems = TableRegistry::getTableLocator()->get('Grilleitems', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Grilleitems);

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

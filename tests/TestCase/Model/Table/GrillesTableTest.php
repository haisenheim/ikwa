<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\GrillesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\GrillesTable Test Case
 */
class GrillesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\GrillesTable
     */
    public $Grilles;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.grilles',
        'app.users',
        'app.grilleitems'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Grilles') ? [] : ['className' => GrillesTable::class];
        $this->Grilles = TableRegistry::getTableLocator()->get('Grilles', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Grilles);

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

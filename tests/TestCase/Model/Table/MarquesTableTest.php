<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\MarquesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\MarquesTable Test Case
 */
class MarquesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\MarquesTable
     */
    public $Marques;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.marques'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Marques') ? [] : ['className' => 'App\Model\Table\MarquesTable'];
        $this->Marques = TableRegistry::get('Marques', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Marques);

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
}

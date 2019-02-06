<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ClientsOffresTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ClientsOffresTable Test Case
 */
class ClientsOffresTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ClientsOffresTable
     */
    public $ClientsOffres;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.clients_offres',
        'app.clients',
        'app.villes',
        'app.pays',
        'app.users',
        'app.offres',
        'app.secteurs',
        'app.fournisseurs',
        'app.types'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('ClientsOffres') ? [] : ['className' => 'App\Model\Table\ClientsOffresTable'];
        $this->ClientsOffres = TableRegistry::get('ClientsOffres', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ClientsOffres);

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

<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\OffresTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\OffresTable Test Case
 */
class OffresTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\OffresTable
     */
    public $Offres;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.offres',
        'app.secteurs',
        'app.fournisseurs',
        'app.users',
        'app.roles',
        'app.clients',
        'app.villes',
        'app.pays',
        'app.clients_offres',
        'app.categories',
        'app.articles'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Offres') ? [] : ['className' => 'App\Model\Table\OffresTable'];
        $this->Offres = TableRegistry::get('Offres', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Offres);

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

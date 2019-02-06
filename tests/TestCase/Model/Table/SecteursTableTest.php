<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\SecteursTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\SecteursTable Test Case
 */
class SecteursTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\SecteursTable
     */
    public $Secteurs;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.secteurs',
        'app.fournisseurs',
        'app.offres',
        'app.types',
        'app.users',
        'app.clients',
        'app.villes',
        'app.pays',
        'app.clients_offres'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Secteurs') ? [] : ['className' => 'App\Model\Table\SecteursTable'];
        $this->Secteurs = TableRegistry::get('Secteurs', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Secteurs);

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

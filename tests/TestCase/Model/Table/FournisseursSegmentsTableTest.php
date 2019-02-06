<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\FournisseursSegmentsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\FournisseursSegmentsTable Test Case
 */
class FournisseursSegmentsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\FournisseursSegmentsTable
     */
    public $FournisseursSegments;

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
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('FournisseursSegments') ? [] : ['className' => 'App\Model\Table\FournisseursSegmentsTable'];
        $this->FournisseursSegments = TableRegistry::get('FournisseursSegments', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->FournisseursSegments);

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

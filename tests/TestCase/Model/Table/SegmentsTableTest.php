<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\SegmentsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\SegmentsTable Test Case
 */
class SegmentsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\SegmentsTable
     */
    public $Segments;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.segments',
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
        'app.fournisseurs_segments'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Segments') ? [] : ['className' => 'App\Model\Table\SegmentsTable'];
        $this->Segments = TableRegistry::get('Segments', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Segments);

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

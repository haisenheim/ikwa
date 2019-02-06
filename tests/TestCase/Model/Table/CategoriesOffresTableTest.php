<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CategoriesOffresTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CategoriesOffresTable Test Case
 */
class CategoriesOffresTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\CategoriesOffresTable
     */
    public $CategoriesOffres;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.categories_offres',
        'app.categories',
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
        $config = TableRegistry::getTableLocator()->exists('CategoriesOffres') ? [] : ['className' => CategoriesOffresTable::class];
        $this->CategoriesOffres = TableRegistry::getTableLocator()->get('CategoriesOffres', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->CategoriesOffres);

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

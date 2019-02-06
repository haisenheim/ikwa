<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\FournisseursSecteursTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\FournisseursSecteursTable Test Case
 */
class FournisseursSecteursTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\FournisseursSecteursTable
     */
    public $FournisseursSecteurs;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.fournisseurs_secteurs',
        'app.fournisseurs',
        'app.secteurs'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('FournisseursSecteurs') ? [] : ['className' => FournisseursSecteursTable::class];
        $this->FournisseursSecteurs = TableRegistry::getTableLocator()->get('FournisseursSecteurs', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->FournisseursSecteurs);

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

<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ProductionTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ProductionTable Test Case
 */
class ProductionTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ProductionTable
     */
    protected $Production;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Production',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Production') ? [] : ['className' => ProductionTable::class];
        $this->Production = $this->getTableLocator()->get('Production', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Production);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}

<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ProductionsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ProductionsTable Test Case
 */
class ProductionsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ProductionsTable
     */
    protected $Productions;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Productions',
        'app.Countries',
        'app.Months',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Productions') ? [] : ['className' => ProductionsTable::class];
        $this->Productions = $this->getTableLocator()->get('Productions', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Productions);

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

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}

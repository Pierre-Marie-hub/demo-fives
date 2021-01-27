<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\MonthsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\MonthsTable Test Case
 */
class MonthsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\MonthsTable
     */
    protected $Months;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
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
        $config = $this->getTableLocator()->exists('Months') ? [] : ['className' => MonthsTable::class];
        $this->Months = $this->getTableLocator()->get('Months', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Months);

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

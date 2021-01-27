<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CountryTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CountryTable Test Case
 */
class CountryTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\CountryTable
     */
    protected $Country;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Country',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Country') ? [] : ['className' => CountryTable::class];
        $this->Country = $this->getTableLocator()->get('Country', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Country);

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

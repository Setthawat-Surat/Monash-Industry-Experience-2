r<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\DesignDraftsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\DesignDraftsTable Test Case
 */
class DesignDraftsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\DesignDraftsTable
     */
    protected $DesignDrafts;

    /**
     * Fixtures
     *
     * @var list<string>
     */
    protected array $fixtures = [
        'app.DesignDrafts',
        'app.Campaigns',
        'app.Admins',
        'app.DesignPhotos',
        'app.Products',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('DesignDrafts') ? [] : ['className' => DesignDraftsTable::class];
        $this->DesignDrafts = $this->getTableLocator()->get('DesignDrafts', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->DesignDrafts);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\DesignDraftsTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\DesignDraftsTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}

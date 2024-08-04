<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\DesignPhotosTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\DesignPhotosTable Test Case
 */
class DesignPhotosTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\DesignPhotosTable
     */
    protected $DesignPhotos;

    /**
     * Fixtures
     *
     * @var list<string>
     */
    protected array $fixtures = [
        'app.DesignPhotos',
        'app.DesignDrafts',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('DesignPhotos') ? [] : ['className' => DesignPhotosTable::class];
        $this->DesignPhotos = $this->getTableLocator()->get('DesignPhotos', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->DesignPhotos);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\DesignPhotosTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\DesignPhotosTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}

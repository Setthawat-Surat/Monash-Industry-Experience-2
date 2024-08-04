<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * DesignPhotosFixture
 */
class DesignPhotosFixture extends TestFixture
{
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'id' => 1,
                'photo' => 'Lorem ipsum dolor sit amet',
                'design_draft_id' => 1,
            ],
        ];
        parent::init();
    }
}

<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * DesignDraftsFixture
 */
class DesignDraftsFixture extends TestFixture
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
                'design_name' => 'Lorem ipsum dolor sit amet',
                'design_yearlevel' => 'Lorem ipsum dolor sit amet',
                'specifications' => 'Lorem ipsum dolor sit amet',
                'approval_status' => 'Lorem ipsum dolor sit amet',
                'sales_price' => 'Lorem ipsum dolor sit amet',
                'final_design_photo' => 'Lorem ipsum dolor sit amet',
                'campaign_id' => 1,
                'user_id' => 1,
            ],
        ];
        parent::init();
    }
}

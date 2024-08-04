<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * CampaignsFixture
 */
class CampaignsFixture extends TestFixture
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
                'name' => 'Lorem ipsum dolor sit amet',
                'default_sales_price' => 'Lorem ipsum dolor sit amet',
                'total_fund_raised' => 'Lorem ipsum dolor sit amet',
                'start_date' => '2024-08-04',
                'end_date' => '2024-08-04',
                'school_id' => 1,
            ],
        ];
        parent::init();
    }
}

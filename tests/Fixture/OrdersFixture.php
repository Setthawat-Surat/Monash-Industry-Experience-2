<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * OrdersFixture
 */
class OrdersFixture extends TestFixture
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
                'customer_name' => 'Lorem ipsum dolor sit amet',
                'customer_contact_number' => 'Lorem ipsum dolor sit amet',
                'customer_contact_email' => 'Lorem ipsum dolor sit amet',
                'date_purchase' => 1723821059,
            ],
        ];
        parent::init();
    }
}

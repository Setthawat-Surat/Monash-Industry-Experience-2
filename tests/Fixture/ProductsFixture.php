<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ProductsFixture
 */
class ProductsFixture extends TestFixture
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
                'product_name' => 'Lorem ipsum dolor sit amet',
                'specifications' => 'Lorem ipsum dolor sit amet',
                'sales_price' => 'Lorem ipsum dolor sit amet',
                'final_design_photo' => 'Lorem ipsum dolor sit amet',
                'design_draft_id' => 1,
            ],
        ];
        parent::init();
    }
}

<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * SchoolsFixture
 */
class SchoolsFixture extends TestFixture
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
                'rep_first_name' => 'Lorem ipsum dolor sit amet',
                'rep_last_name' => 'Lorem ipsum dolor sit amet',
                'rep_email' => 'Lorem ipsum dolor sit amet',
                'address' => 'Lorem ipsum dolor sit amet',
                'code' => 'Lorem ipsum dolor sit amet',
                'bank_account_name' => 'Lorem ipsum dolor sit amet',
                'bank_account_number' => 'Lorem ipsum dolor sit amet',
                'bsb' => 'Lorem ipsum dolor sit amet',
                'approval_status' => 1,
                'logo' => 'Lorem ipsum dolor sit amet',
            ],
        ];
        parent::init();
    }
}

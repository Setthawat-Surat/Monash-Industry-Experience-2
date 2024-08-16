<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * School Entity
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $rep_first_name
 * @property string|null $rep_last_name
 * @property string|null $rep_email
 * @property string|null $address
 * @property string|null $code
 * @property string|null $bank_account_name
 * @property string|null $bank_account_number
 * @property string|null $bsb
 * @property bool|null $approval_status
 * @property string|null $logo
 *
 * @property \App\Model\Entity\Campaign[] $campaigns
 */
class School extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array<string, bool>
     */
    protected array $_accessible = [
        'name' => true,
        'rep_first_name' => true,
        'rep_last_name' => true,
        'rep_email' => true,
        'address' => true,
        'code' => true,
        'bank_account_name' => true,
        'bank_account_number' => true,
        'bsb' => true,
        'approval_status' => true,
        'logo' => true,
        'campaigns' => true,
    ];
}

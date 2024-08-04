<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Campaign Entity
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $default_sales_price
 * @property string|null $total_fund_raised
 * @property \Cake\I18n\Date|null $start_date
 * @property \Cake\I18n\Date|null $end_date
 * @property int|null $school_id
 *
 * @property \App\Model\Entity\School $school
 * @property \App\Model\Entity\DesignDraft[] $design_drafts
 */
class Campaign extends Entity
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
        'default_sales_price' => true,
        'total_fund_raised' => true,
        'start_date' => true,
        'end_date' => true,
        'school_id' => true,
        'school' => true,
        'design_drafts' => true,
    ];
}

<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * DesignDraft Entity
 *
 * @property int $id
 * @property string|null $design_name
 * @property string|null $design_yearlevel
 * @property string|null $specifications
 * @property string|null $approval_status
 * @property string|null $belly_band
 * @property string|null $sales_price
 * @property string|null $logo_position
 * @property string|null $feedback
 * @property string|null $final_design_photo
 * @property int|null $campaign_id
 * @property int|null $user_id
 *
 * @property \App\Model\Entity\Campaign $campaign
 * @property \App\Model\Entity\DesignPhoto[] $design_photos
 * @property \App\Model\Entity\Product[] $products
 */
class DesignDraft extends Entity
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
        'design_name' => true,
        'design_yearlevel' => true,
        'specifications' => true,
        'logo_position' => true,
        'approval_status' => true,
        'belly_band' => true,
        'sales_price' => true,
        'final_design_photo' => true,
        'feedback' => true,
        'campaign_id' => true,
        'user_id' => true,
        'campaign' => true,
        'design_photos' => true,
        'products' => true,
    ];
}

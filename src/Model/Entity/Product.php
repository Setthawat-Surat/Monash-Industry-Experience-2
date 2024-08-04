<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Product Entity
 *
 * @property int $id
 * @property string|null $product_name
 * @property string|null $specifications
 * @property string|null $sales_price
 * @property string|null $final_design_photo
 * @property int|null $design_draft_id
 *
 * @property \App\Model\Entity\DesignDraft $design_draft
 * @property \App\Model\Entity\ProductOrder[] $product_orders
 */
class Product extends Entity
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
        'product_name' => true,
        'specifications' => true,
        'sales_price' => true,
        'final_design_photo' => true,
        'design_draft_id' => true,
        'design_draft' => true,
        'product_orders' => true,
    ];
}

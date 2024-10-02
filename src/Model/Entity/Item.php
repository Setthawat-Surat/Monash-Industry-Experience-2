<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Item Entity
 *
 * @property int $id
 * @property string|null $name
 * @property int|null $price
 * @property int|null $quantity
 * @property int|null $design_draft_id
 * @property int|null $order_id
 *
 * @property \App\Model\Entity\DesignDraft $design_draft
 * @property \App\Model\Entity\Order $order
 */
class Item extends Entity
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
        'price' => true,
        'quantity' => true,
        'design_draft_id' => true,
        'order_id' => true,
        'design_draft' => true,
        'order' => true,
    ];
}

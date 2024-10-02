<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Order Entity
 *
 * @property int $id
 * @property string|null $customer_name
 * @property string|null $customer_contact_number
 * @property string|null $customer_contact_email
 * @property \Cake\I18n\DateTime $date_purchase
 *
 * @property \App\Model\Entity\Item[] $items
 * @property \App\Model\Entity\ProductOrder[] $product_orders
 */
class Order extends Entity
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
        'customer_name' => true,
        'customer_contact_number' => true,
        'customer_contact_email' => true,
        'status' => true,
        'date_purchase' => true,
        'items' => true,
        'product_orders' => true,
    ];
}

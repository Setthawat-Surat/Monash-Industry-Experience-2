<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Admin Entity
 *
 * @property int $id
 * @property string|null $first_name
 * @property string|null $last_name
 *
 * @property \App\Model\Entity\DesignDraft[] $design_drafts
 */
class Admin extends Entity
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
        'first_name' => true,
        'last_name' => true,
        'design_drafts' => true,
    ];
}

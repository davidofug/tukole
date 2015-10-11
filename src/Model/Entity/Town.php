<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Town Entity.
 */
class Town extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        'date' => true,
        'districts_id' => true,
        'name' => true,
        'district' => true,
    ];
}

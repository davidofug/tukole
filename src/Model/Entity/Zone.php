<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Zone Entity.
 */
class Zone extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        'date' => true,
        'towns_id' => true,
        'name' => true,
        'town' => true,
    ];
}

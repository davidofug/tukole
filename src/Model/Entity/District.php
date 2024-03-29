<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * District Entity.
 */
class District extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        'date' => true,
        'name' => true,
    ];
}

<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Work Entity.
 */
class Work extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        'date' => true,
        'userid' => true,
        'title' => true,
        'details' => true,
    ];
}

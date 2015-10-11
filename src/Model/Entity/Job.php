<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Job Entity.
 */
class Job extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        'date' => true,
        'mdate' => true,
        'mtimes' => true,
        'hirers_id' => true,
        'appliers_id' => true,
        'title' => true,
        'location' => true,
        'phone' => true,
        'budget' => true,
        'start' => true,
        'end' => true,
        'status' => true,
        'details' => true,
        'hirer' => true,
        'applier' => true,
    ];
}

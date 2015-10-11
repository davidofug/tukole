<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Hirer Entity.
 */
class Hirer extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        'date' => true,
        'users_id' => true,
        'jobs_id' => true,
        'user' => true,
        'job' => true,
    ];
}

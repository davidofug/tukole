<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Reply Entity.
 */
class Reply extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        'date' => true,
        'msg' => true,
        'jobs_id' => true,
        'title' => true,
        'senders_id' => true,
        'receivers_id' => true,
        'status' => true,
        'job' => true,
        'sender' => true,
        'receiver' => true,
    ];
}

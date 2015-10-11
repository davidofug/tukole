<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Message Entity.
 */
class Message extends Entity
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
		'jobtitle' => true,
        'senders_id' => true,
        'receivers_id' => true,
        'responseid' => true,
        'status' => true,
        //'job' => true,
        //'sender' => true,
        //'receiver' => true,
    ];
}

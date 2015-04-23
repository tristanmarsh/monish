<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * InternetConnection Entity.
 */
class InternetConnection extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        'lease_id' => true,
        'bandwidth' => true,
        'monthly_fee' => true,
        'date_start' => true,
        'date_end' => true,
        'status' => true,
        'lease' => true,
    ];
}

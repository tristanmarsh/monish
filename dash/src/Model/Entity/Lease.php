<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Lease Entity.
 */
class Lease extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        'room_id' => true,
        'student_id' => true,
        'property_id' => true,
        'date_start' => true,
        'date_end' => true,
        'lease_status' => true,
        'weekly_price' => true,
        'room' => true,
        'student' => true,
        'internet_connection' => true,
        'payments' => true,
    ];
}

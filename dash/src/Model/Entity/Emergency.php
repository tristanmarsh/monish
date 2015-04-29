<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Emergency Entity.
 */
class Emergency extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        'first_name' => true,
        'last_name' => true,
        'phone' => true,
        'email' => true,
        'emergency_student' => true,
        'students' => true,
    ];
}

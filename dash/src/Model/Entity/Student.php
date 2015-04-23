<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Student Entity.
 */
class Student extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        'expected_grad_date' => true,
        'person_id' => true,
        'country_of_birth' => true,
        'person' => true,
        'emergency_student' => true,
        'leases' => true,
    ];
}

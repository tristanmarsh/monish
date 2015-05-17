<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Property Entity.
 */
class Property extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        'address' => true,
        'number_rooms' => true,
        'bathrooms' => true,
        'kitchens' => true,
        'storeys' => true,
        'garage' => true,
        'rooms' => true,
        'leases' => true,
        'property_id' => true,
    ];
}

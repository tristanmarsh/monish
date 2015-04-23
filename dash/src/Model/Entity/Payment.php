<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Payment Entity.
 */
class Payment extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        'lease_id' => true,
        'date_paid' => true,
        'amount' => true,
        'payment_period_starting' => true,
        'lease' => true,
    ];
}

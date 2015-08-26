<?php
// src/Model/Entity/User.php
namespace App\Model\Entity;

use Cake\Auth\DefaultPasswordHasher;
use Cake\ORM\Entity;
use Cake\ORM\Rule\IsUnique;

class Person extends Entity
{

    protected function _getFullName()
    {
        return $this->_properties['first_name'] . '  ' . $this->_properties['last_name'] . ' (' . $this->_properties['email'] . ')';
    }

}
?>
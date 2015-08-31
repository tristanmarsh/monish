<?php

namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

class MacaddressesTable extends Table
{
    public function initialize(array $config)
    {
        $this->addBehavior('Timestamp');
        $this->belongsTo('People', [
            'foreignKey' => 'person_id'
        ]);
    }

//    public function validationDefault(Validator $validator)
//    {
//        $validator
//            ->notEmpty('person_id');
//
//        return $validator;
//    }

}

?>
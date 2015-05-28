<?php
namespace App\Model\Table;

use App\Model\Entity\Property;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Properties Model
 */
class PropertiesTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        $this->table('properties');
        $this->primaryKey('id');
        $this->displayField('id');
        $this->hasMany('Rooms', [
            'foreignKey' => 'property_id'
        ]);
        $this->hasMany('Leases', [
            'foreignKey' => 'property_id'
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->add('id', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('id', 'create')
            ->requirePresence('address', 'create')
            ->notEmpty('address')
            ->add('number_rooms', 'valid', ['rule' => 'numeric'])
            ->requirePresence('number_rooms', 'create')
            ->notEmpty('number_rooms')
            ->add('bathrooms', 'valid', ['rule' => 'numeric'])
            ->requirePresence('bathrooms', 'create')
            ->notEmpty('bathrooms')
            ->add('kitchens', 'valid', ['rule' => 'numeric'])
            ->requirePresence('kitchens', 'create')
            ->notEmpty('kitchens')
            ->add('storeys', 'valid', ['rule' => 'numeric'])
            ->requirePresence('storeys', 'create')
            ->notEmpty('storeys')
            ->requirePresence('garage', 'create')
            ->notEmpty('garage');

        return $validator;
    }
}

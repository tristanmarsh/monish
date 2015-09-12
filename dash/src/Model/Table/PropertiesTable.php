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
		$this->addBehavior('Utils.Uploadable', [
		  'avatar' => [
			'path' => '{ROOT}{DS}{WEBROOT}{DS}img{DS}{model}{DS}{field}{DS}',
			'removeFileOnUpdate' => true,
			'removeFileOnDelete' => true, 
			'fields' => [
				'directory' => 'avatar_directory',
				'url' => 'avatar_url',
				'type' => 'avatar_type',
				'size' => 'avatar_size',
				'fileName' => 'avatar_name'
			  ]
			],
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
            ->notEmpty('address');

        return $validator;
    }
}

<?php
// src/Model/Table/PeopleTable.php
namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\ORM\RulesChecker;
use Cake\ORM\isUnique;

class PeopleTable extends Table
{

    public function initialize(array $config)
    {
        $this->addBehavior('Timestamp');
        $this->table('people');
        $this->displayField('first_name');
        $this->primaryKey('id');
        $this->hasOne('Users', [
            'foreignKey' => 'person_id'
        ]);
        $this->hasOne('Students', [
            'foreignKey' => 'person_id'
        ]);
        $this->hasOne('Macaddresses', [
            'foreignKey' => 'person_id'
        ]);
        $this->hasMany('Requests', [
            'foreignKey' => 'person_id'
        ]);
    }
	
	public function validationDefault(Validator $validator)
    {
        $validator
            ->notEmpty('first_name', 'A first name is required')
            ->notEmpty('last_name', 'A last name is required')
			->notEmpty('gender', 'A gender is required')
            ->notEmpty('phone', 'A phone number is required')
            ->add('phone', [
            'length' => [
            'rule' => ['minLength', 10],
            'message' => 'phone need to be at least 10 numbers long',
            ]
            ])
            ->notEmpty('email', 'An email is required')
            ->notEmpty('internet_plan', 'An internet plan is required')
            ->notEmpty('username', 'A username is required')
            ->notEmpty('password', 'A password is required')
            ->notEmpty('date_start')
            ->notEmpty('date_end');

        return $validator;    
    }
	
	public function buildRules(RulesChecker $rules)
	{
        $rules->add($rules->isUnique(['email'], 'This email is already registered'));
        return $rules;
	}

}

?>
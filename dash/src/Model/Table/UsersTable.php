<?php
// src/Model/Table/UsersTable.php
namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\ORM\RulesChecker;
use Cake\ORM\isUnique;

class UsersTable extends Table
{



    public function initialize(array $config)
    {
        $this->addBehavior('Timestamp');
        $this->table('users');
        $this->displayField('id');
        $this->primaryKey('id');
        $this->belongsTo('People', [
            'foreignKey' => 'person_id'
        ]);
        $this->hasMany('Requests', [
            'foreignKey' => 'user_id'
        ]);
    }
	
	public function buildRules(RulesChecker $rules)
	{
		$rules->add($rules->isUnique(['username'], 'This username is already registered'));
        $rules->add($rules->isUnique(['email'], 'This email is already registered'));
		return $rules;
	}

    public function validationDefault(Validator $validator)
    {
        return $validator
            ->notEmpty('username', 'A username is required')
            ->notEmpty('password', 'A password is required')
            ->add('password', [
            'length' => [
            'rule' => ['minLength', 6],
            'message' => 'Your password needs to be at least 6 letters long',
            ]
            ])
            ->add('username', 'validFormat', [
            'rule' => 'email',
            'message' => 'E-mail must be valid'
            ])
            ->add('phone', [
            'length' => [
            'rule' => ['minLength', 10],
            'message' => 'Your phone number need to be at least 10 numbers long',
            ]
            ])
            // ->add('password','custom',['rule'=> function($value, $context){
            //         if(isset($context->data['confirm_password']) && $value != $context->data['confirm_password']){
            //             return false;
            //     }
            //     return true;
            // },    'message'=>"Your password does not match your confirm password.  Please try again",    'on'=> ['create','update'],'allowEmpty'=>true])

            //->add('password', [
			//'compare' => [
			//'rule' => ['compareWith', 'confirm_password']
			//]
			//])
			->notEmpty('person_id', 'A person is required')
            ->notEmpty('role', 'A role is required')
            ->add('role', 'inList', [
                'rule' => ['inList', ['admin', 'tenant']],
                'message' => 'Please enter a valid role'
            ]);
    }

}

?>
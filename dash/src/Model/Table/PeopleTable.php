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
    }
	
	public function buildRules(RulesChecker $rules)
	{
        $rules->add($rules->isUnique(['email'], 'This email is already registered'));
		return $rules;
	}

}

?>
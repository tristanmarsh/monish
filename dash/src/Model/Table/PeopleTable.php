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
    }
	
	public function buildRules(RulesChecker $rules)
	{
        $rules->add($rules->isUnique(['email'], 'This email is already registered'));
		return $rules;
	}

}

?>
<?php
namespace App\Model\Table;

use App\Model\Entity\InternetConnection;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * InternetConnection Model
 */
class InternetConnectionTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        $this->table('internet_connection');
        $this->displayField('id');
        $this->primaryKey('id');
        $this->belongsTo('Leases', [
            'foreignKey' => 'lease_id'
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
            ->requirePresence('bandwidth', 'create')
            ->notEmpty('bandwidth')
            ->requirePresence('monthly_fee', 'create')
            ->notEmpty('monthly_fee')
            ->add('date_start', 'valid', ['rule' => 'date'])
            ->requirePresence('date_start', 'create')
            ->notEmpty('date_start')
            ->add('date_end', 'valid', ['rule' => 'date'])
            ->requirePresence('date_end', 'create')
            ->notEmpty('date_end')
            ->allowEmpty('status');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['lease_id'], 'Leases'));
        return $rules;
    }
}

<?php
namespace App\Model\Table;

use App\Model\Entity\Payment;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Payments Model
 */
class PaymentsTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        $this->table('payments');
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
            ->add('date_paid', 'valid', ['rule' => 'date'])
            ->requirePresence('date_paid', 'create')
            ->notEmpty('date_paid')
            ->add('amount', 'valid', ['rule' => 'numeric'])
            ->requirePresence('amount', 'create')
            ->notEmpty('amount')
            ->add('payment_period_starting', 'valid', ['rule' => 'date'])
            ->requirePresence('payment_period_starting', 'create')
            ->notEmpty('payment_period_starting');

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

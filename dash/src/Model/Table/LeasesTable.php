<?php
namespace App\Model\Table;

use App\Model\Entity\Lease;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Leases Model
 */
class LeasesTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        $this->table('leases');
        $this->displayField('id');
        $this->primaryKey('id');
        $this->belongsTo('Rooms', [
            'foreignKey' => 'room_id'
        ]);
        $this->belongsTo('Students', [
            'foreignKey' => 'student_id'
        ]);
        $this->hasMany('InternetConnection', [
            'foreignKey' => 'lease_id'
        ]);
        $this->hasMany('Payments', [
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
            ->add('date_start', 'valid', ['rule' => 'date'])
            ->requirePresence('date_start', 'create')
            ->notEmpty('date_start')
            ->add('date_end', 'valid', ['rule' => 'date'])
            ->requirePresence('date_end', 'create')
            ->notEmpty('date_end')
            ->requirePresence('lease_status', 'create')
            ->notEmpty('lease_status')
            ->add('weekly_price', 'valid', ['rule' => 'numeric'])
            ->requirePresence('weekly_price', 'create')
            ->notEmpty('weekly_price');

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
        $rules->add($rules->existsIn(['room_id'], 'Rooms'));
        $rules->add($rules->existsIn(['student_id'], 'Students'));
        return $rules;
    }
}

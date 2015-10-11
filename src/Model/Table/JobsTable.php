<?php
namespace App\Model\Table;

use App\Model\Entity\Job;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Jobs Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Hirers
 * @property \Cake\ORM\Association\BelongsTo $Appliers
 */
class JobsTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        $this->table('jobs');
        $this->displayField('title');
        $this->primaryKey('id');
        $this->hasOne('Hirers',[
			'foreignKey'=>'hirers_id',
		]);
        /*$this->belongsTo('Appliers', [
            'foreignKey' => 'appliers_id',
            'joinType' => 'INNER'
        ]);*/
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
            ->allowEmpty('id', 'create');
            
        $validator
            ->requirePresence('date', 'create')
            ->notEmpty('date');
            
        $validator
            ->requirePresence('mdate', 'create')
            ->notEmpty('mdate');
            
        $validator
            ->add('mtimes', 'valid', ['rule' => 'numeric'])
            ->requirePresence('mtimes', 'create')
            ->allowEmpty('mtimes');
            
        $validator
            ->requirePresence('title', 'create')
            ->notEmpty('title');
            
        $validator
            ->requirePresence('location', 'create')
            ->notEmpty('location');
            
        $validator
            ->requirePresence('phone', 'create')
            ->notEmpty('phone');
            
        $validator
            ->add('budget', 'valid', ['rule' => 'numeric'])
            ->requirePresence('budget', 'create')
            ->notEmpty('budget');
            
        $validator
            ->add('start', 'valid', ['rule' => 'datetime'])
            ->requirePresence('start', 'create')
            ->notEmpty('start');
            
        $validator
            ->add('end', 'valid', ['rule' => 'datetime'])
            ->requirePresence('end', 'create')
            ->notEmpty('end');
            
        $validator
            ->add('status', 'valid', ['rule' => 'boolean'])
            ->requirePresence('status', 'create')
            ->notEmpty('status');
            
        $validator
            ->requirePresence('details', 'create')
            ->notEmpty('details');

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
        //$rules->add($rules->existsIn(['hirers_id'], 'Hirers'));
        //$rules->add($rules->existsIn(['appliers_id'], 'Appliers'));
        return $rules;
    }
	public function isOwnedBy($jobId, $userId)
	{
    return $this->exists(['id' => $jobId, 'hirers_id' => $userId]);
	}
}

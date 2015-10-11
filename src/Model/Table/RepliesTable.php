<?php
namespace App\Model\Table;

use App\Model\Entity\Reply;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Replies Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Jobs
 * @property \Cake\ORM\Association\BelongsTo $Senders
 * @property \Cake\ORM\Association\BelongsTo $Receivers
 */
class RepliesTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        $this->table('replies');
        $this->displayField('title');
        $this->primaryKey('id');
        $this->belongsTo('Messages', [
            'foreignKey' => 'messages_id',
            'joinType' => 'INNER'
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
            ->allowEmpty('id', 'create');
            
        $validator
            ->allowEmpty('date');
            
        $validator
            ->requirePresence('msg', 'create')
            ->notEmpty('msg');
            
        $validator
            ->requirePresence('title', 'create')
            ->notEmpty('title');
            
        $validator
            ->add('status', 'valid', ['rule' => 'boolean'])
            ->requirePresence('status', 'create')
            ->notEmpty('status');

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
        //$rules->add($rules->existsIn(['jobs_id'], 'Jobs'));
        //$rules->add($rules->existsIn(['senders_id'], 'Senders'));
        $rules->add($rules->existsIn(['messages_id'], 'Messages'));
        return $rules;
    }
}

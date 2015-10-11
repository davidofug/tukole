<?php
namespace App\Model\Table;

use App\Model\Entity\Message;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Messages Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Jobs
 * @property \Cake\ORM\Association\BelongsTo $Senders
 * @property \Cake\ORM\Association\BelongsTo $Receivers
 */
class MessagesTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        $this->table('messages');
        $this->displayField('id');
        $this->primaryKey('id');
        $this->belongsTo('Jobs', [
            'foreignKey' => 'jobs_id',
            'joinType' => 'INNER'
        ]);
		$this->hasMany('Replys',[
			'foreignKey'=>'messages_id',
			'joinType'=>'INNER'
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
            ->requirePresence('date', 'create')
            ->allowEmpty('date');
            
        $validator
            ->requirePresence('msg', 'create')
            ->notEmpty('msg');
            
        $validator
            ->requirePresence('responseid','create')
			->add('responseid','valid', ['rule' => 'numeric'])
            ->allowEmpty('responseid');
            
        $validator
            //->add('status', 'valid', ['rule' => 'boolean'])
            ->requirePresence('status', 'create','update')
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
        $rules->add($rules->existsIn(['jobs_id'], 'Jobs'));
       return $rules;
    }
}

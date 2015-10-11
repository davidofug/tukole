<?php
namespace App\Model\Table;

use App\Model\Entity\Work;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Works Model
 *
 */
class WorksTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        $this->table('works');
        $this->displayField('title');
        $this->primaryKey('id');
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
            ->add('date', 'valid', ['rule' => 'date'])
            ->requirePresence('date', 'create')
            ->notEmpty('date');
            
        $validator
            ->add('userid', 'valid', ['rule' => 'numeric'])
            ->requirePresence('userid', 'create')
            ->notEmpty('userid');
            
        $validator
            ->requirePresence('title', 'create')
            ->notEmpty('title');
            
        $validator
            ->requirePresence('details', 'create')
            ->notEmpty('details');

        return $validator;
    }
}

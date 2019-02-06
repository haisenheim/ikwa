<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Grilleitems Model
 *
 * @property \App\Model\Table\GrillesTable|\Cake\ORM\Association\BelongsTo $Grilles
 *
 * @method \App\Model\Entity\Grilleitem get($primaryKey, $options = [])
 * @method \App\Model\Entity\Grilleitem newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Grilleitem[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Grilleitem|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Grilleitem|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Grilleitem patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Grilleitem[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Grilleitem findOrCreate($search, callable $callback = null, $options = [])
 */
class GrilleitemsTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('grilleitems');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Grilles', [
            'foreignKey' => 'grille_id',
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
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->integer('min')
            ->requirePresence('min', 'create')
            ->notEmpty('min');

        $validator
            ->integer('max')
            ->requirePresence('max', 'create')
            ->notEmpty('max');

        $validator
            ->integer('coef')
            ->requirePresence('coef', 'create')
            ->notEmpty('coef');

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
        $rules->add($rules->existsIn(['grille_id'], 'Grilles'));

        return $rules;
    }
}

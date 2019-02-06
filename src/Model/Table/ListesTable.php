<?php
namespace App\Model\Table;

use App\Model\Entity\Liste;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Listes Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Fournisseurs
 * @property \Cake\ORM\Association\HasMany $Listeitems
 */
class ListesTable extends Table
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

        $this->setTable('listes');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Fournisseurs', [
            'foreignKey' => 'fournisseur_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Grilles', [
            'foreignKey' => 'grille_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('Listeitems', [
            'foreignKey' => 'liste_id'
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
            ->requirePresence('name', 'create')
            ->notEmpty('name');





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
        $rules->add($rules->existsIn(['fournisseur_id'], 'Fournisseurs'));
        return $rules;
    }
}

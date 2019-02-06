<?php
namespace App\Model\Table;

use App\Model\Entity\Listeitem;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Listeitems Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Offres
 * @property \Cake\ORM\Association\BelongsTo $Listes
 */
class ListeitemsTable extends Table
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

        $this->setTable('listeitems');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Offres', [
            'foreignKey' => 'offre_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Listes', [
            'foreignKey' => 'liste_id',
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
            ->integer('prix_magasin')
            ->requirePresence('prix_magasin', 'create')
            ->notEmpty('prix_magasin');

        $validator
            ->integer('prix_ikwa')
            ->requirePresence('prix_ikwa', 'create')
            ->notEmpty('prix_ikwa');

        $validator
            ->integer('prix_vente_ikwa')
            ->requirePresence('prix_vente_ikwa', 'create')
            ->notEmpty('prix_vente_ikwa');

        $validator
            ->dateTime('date_limite')
            ->requirePresence('date_limite', 'create')
            ->notEmpty('date_limite');

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
        $rules->add($rules->existsIn(['offre_id'], 'Offres'));
        $rules->add($rules->existsIn(['liste_id'], 'Listes'));
        return $rules;
    }
}

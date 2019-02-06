<?php
namespace App\Model\Table;

use App\Model\Entity\Fournisseur;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Fournisseurs Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Secteurs
 * @property \Cake\ORM\Association\HasMany $Offres
 * @property \Cake\ORM\Association\HasMany $Users
 */
class FournisseursTable extends Table
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

        $this->setTable('fournisseurs');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->hasMany('Offres', [
            'foreignKey' => 'fournisseur_id'
        ]);
        $this->hasMany('Listes', [
            'foreignKey' => 'fournisseur_id'
        ]);
        $this->hasMany('Orders', [
            'foreignKey' => 'fournisseur_id'
        ]);

        $this->hasMany('Users', [
            'foreignKey' => 'fournisseur_id'
        ]);

        $this->hasMany('Categories', [
            'foreignKey' => 'fournisseur_id'
        ]);

        $this->belongsTo('Groupes',['foreignKey'=>'groupe_id']);

        $this->belongsTo('Villes',['foreignKey'=>'ville_id']);

        $this->belongsToMany('Secteurs', [
            'foreignKey' => 'fournisseur_id',
            'targetForeignKey' => 'secteur_id',
            'joinTable' => 'fournisseurs_secteurs'
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
        $rules->add($rules->isUnique(['email']));
        return $rules;
    }
}

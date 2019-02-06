<?php
namespace App\Model\Table;

use App\Model\Entity\Secteur;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Secteurs Model
 *
 * @property \Cake\ORM\Association\HasMany $Fournisseurs
 * @property \Cake\ORM\Association\HasMany $Offres
 */
class SecteursTable extends Table
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

        $this->setTable('secteurs');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->hasMany('Fournisseurs', [
            'foreignKey' => 'secteur_id'
        ]);
        $this->hasMany('Offres', [
            'foreignKey' => 'secteur_id'
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
}

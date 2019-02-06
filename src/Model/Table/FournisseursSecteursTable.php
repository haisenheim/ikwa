<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * FournisseursSecteurs Model
 *
 * @property \App\Model\Table\FournisseursTable|\Cake\ORM\Association\BelongsTo $Fournisseurs
 * @property \App\Model\Table\SecteursTable|\Cake\ORM\Association\BelongsTo $Secteurs
 *
 * @method \App\Model\Entity\FournisseursSecteur get($primaryKey, $options = [])
 * @method \App\Model\Entity\FournisseursSecteur newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\FournisseursSecteur[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\FournisseursSecteur|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\FournisseursSecteur|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\FournisseursSecteur patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\FournisseursSecteur[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\FournisseursSecteur findOrCreate($search, callable $callback = null, $options = [])
 */
class FournisseursSecteursTable extends Table
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

        $this->setTable('fournisseurs_secteurs');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Fournisseurs', [
            'foreignKey' => 'fournisseur_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Secteurs', [
            'foreignKey' => 'secteur_id',
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
        $rules->add($rules->existsIn(['secteur_id'], 'Secteurs'));

        return $rules;
    }
}

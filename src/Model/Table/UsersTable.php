<?php
namespace App\Model\Table;

use App\Model\Entity\User;
use Cake\Auth\DefaultPasswordHasher;
use Cake\Event\Event;
use Cake\ORM\Query;
use Cake\Utility\Text;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Users Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Roles
 * @property \Cake\ORM\Association\HasMany $Factures
 * @property \Cake\ORM\Association\HasMany $Plistes
 * @property \Cake\ORM\Association\HasMany $Purchasecontracts
 * @property \Cake\ORM\Association\HasMany $Salecontracts
 * @property \Cake\ORM\Association\HasMany $Slistes
 */
class UsersTable extends Table
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

        $this->setTable('users');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Roles', [
            'foreignKey' => 'role_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Villes', [
            'foreignKey' => 'ville_id',
            'joinType' => 'Left'
        ]);
        $this->belongsTo('Fournisseurs', [
            'foreignKey' => 'fournisseur_id',
            'joinType' => 'Left'
        ]);
        $this->belongsTo('Groupes', [
            'foreignKey' => 'groupe_id',
            'joinType' => 'Left'
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
            ->requirePresence('phone', 'create')
            ->notEmpty('phone');

        $validator
            ->requirePresence('password', 'create')
            ->notEmpty('password');

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
        $rules->add($rules->isUnique(['phone']));
        return $rules;
    }




    /*public function beforeSave(Event $event)
    {
        $entity = $event->data['entity'];
        if ($entity->isNew()) {
            $hasher = new DefaultPasswordHasher();
// Generate an API 'token'
            $entity->api_key_plain = sha1(Text::uuid());
// Bcrypt the token so BasicAuthenticate can check
// it during login.
            $entity->api_key = $hasher->hash($entity->api_key_plain);
        }
        return true;
    }*/
}

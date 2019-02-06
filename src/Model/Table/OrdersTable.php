<?php
namespace App\Model\Table;

use App\Model\Entity\Order;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

class OrdersTable extends Table
{

////////////////////////////////////////////////////////////////////////////////

    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('orders');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Users',[
            'foreignKey'=>'user_id'
        ]);

        /*$this->belongsTo('Payers',[
            'className'=>'Users',
            'foreignKey'=>'payer_id'
        ]);*/

        $this->belongsTo('Servers',[
            'className'=>'Users',
            'foreignKey'=>'server_id',
            'joinType'=>'Left'
        ]);

        $this->belongsTo('Fournisseurs',[
            'foreignKey'=>'fournisseur_id',
            'joinType'=>'Left'
        ]);


        $this->hasOne('Paiements',[
            'foreignKey'=>'paiement_id',
            'joinType'=>'Left'
        ]);

        $this->hasMany('Ordersitems', [
            'foreignKey' => 'order_id',
            'dependent' => true,
        ]);


    }

////////////////////////////////////////////////////////////////////////////////

    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmpty('id', 'create');

        return $validator;
    }

////////////////////////////////////////////////////////////////////////////////

    public function validationReview(Validator $validator)
    {
        $validator = $this->validationDefault($validator);

        return $validator;
    }

////////////////////////////////////////////////////////////////////////////////

    // public function buildRules(RulesChecker $rules)
    // {
    //     $rules->add($rules->isUnique(['email']));
    //     return $rules;
    // }

////////////////////////////////////////////////////////////////////////////////

}

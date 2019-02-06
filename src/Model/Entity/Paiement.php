<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Paiement Entity
 *
 * @property int $id
 * @property string $name
 * @property int $order_id
 * @property int $user_id
 * @property int $total
 * @property int $total_fournisseur
 * @property int $marge_ikwa
 * @property \Cake\I18n\FrozenTime $created
 * @property int $fournisseur_id
 *
 * @property \App\Model\Entity\Order $order
 * @property \App\Model\Entity\User $user
 */
class Paiement extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'name' => true,
        'order_id' => true,
        'user_id' => true,
        'total' => true,
        'total_fournisseur' => true,
        'marge_ikwa' => true,
        'created' => true,
        'fournisseur_id' => true,
        'order' => true,
        'user' => true
    ];
}

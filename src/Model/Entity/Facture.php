<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Facture Entity.
 *
 * @property int $id
 * @property string $name
 * @property int $fournisseur_id
 * @property \App\Model\Entity\Fournisseur $fournisseur
 * @property \Cake\I18n\Time $created
 * @property int $point_id
 * @property \App\Model\Entity\Point $point
 * @property int $user_id
 * @property \App\Model\Entity\User $user
 * @property int $statut
 * @property \App\Model\Entity\Order[] $orders
 * @property \App\Model\Entity\Paiement[] $paiements
 */
class Facture extends Entity
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
        '*' => true,
        'id' => false,
    ];

    public function _getMontant(){
        $m=0;
        if(!empty($this->orders)){
            foreach($this->orders as $order){
                $m=$m+$order->totalcmd;
            }
        }
        return $m;
    }
}

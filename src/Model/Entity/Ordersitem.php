<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Ordersitem Entity
 *
 * @property int $id
 * @property int $offre_id
 * @property int $order_id
 * @property int $quantity
 * @property int $prix
 * @property int $status
 *
 * @property \App\Model\Entity\Order $order
 * @property \App\Model\Entity\Offre $offre
 */
class Ordersitem extends Entity
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
        'offre_id' => true,
        'order_id' => true,
        'quantity' => true,
        'prix' => true,
        'status' => true,
        'order' => true,
        'offre' => true
    ];

    protected function _getTotal(){
        return $this->prix * $this->quantity;
    }
}

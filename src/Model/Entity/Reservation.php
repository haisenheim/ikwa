<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Reservation Entity.
 *
 * @property int $id
 * @property string $name
 * @property int $offre_id
 * @property \App\Model\Entity\Offre $offre
 * @property int $user_id
 * @property \Cake\I18n\Time $created
 * @property int $payee
 * @property \Cake\I18n\Time $date_paie
 * @property int $point_id
 * @property \App\Model\Entity\Point $point
 * @property int $versee
 * @property \Cake\I18n\Time $date_verse
 * @property int $paiement_id
 * @property \App\Model\Entity\Paiement $paiement
 * @property \App\Model\Entity\Client $client
 */
class Reservation extends Entity
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
}

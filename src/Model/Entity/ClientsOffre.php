<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * ClientsOffre Entity.
 *
 * @property int $id
 * @property int $client_id
 * @property \App\Model\Entity\Client $client
 * @property int $offre_id
 * @property \App\Model\Entity\Offre $offre
 * @property \Cake\I18n\Time $created
 * @property int $user_id
 * @property \App\Model\Entity\User $user
 */
class ClientsOffre extends Entity
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

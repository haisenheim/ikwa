<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Client Entity.
 *
 * @property int $id
 * @property string $name
 * @property string $adresse
 * @property string $telephone
 * @property string $mobile
 * @property string $email
 * @property int $ville_id
 * @property \App\Model\Entity\Ville $ville
 * @property \App\Model\Entity\User[] $users
 * @property \App\Model\Entity\Offre[] $offres
 */
class Client extends Entity
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

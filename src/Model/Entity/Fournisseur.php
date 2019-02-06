<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Fournisseur Entity.
 *
 * @property int $id
 * @property string $name
 * @property string $telephone
 * @property string $email
 * @property string $representant
 * @property string $mobile
 * @property int $secteur_id
 * @property \App\Model\Entity\Secteur $secteur
 * @property string $code
 * @property \App\Model\Entity\Offre[] $offres
 * @property \App\Model\Entity\User[] $users
 */
class Fournisseur extends Entity
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

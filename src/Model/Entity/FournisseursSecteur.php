<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * FournisseursSecteur Entity
 *
 * @property int $id
 * @property int $fournisseur_id
 * @property int $secteur_id
 *
 * @property \App\Model\Entity\Fournisseur $fournisseur
 * @property \App\Model\Entity\Secteur $secteur
 */
class FournisseursSecteur extends Entity
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
        'fournisseur_id' => true,
        'secteur_id' => true,
        'fournisseur' => true,
        'secteur' => true
    ];
}

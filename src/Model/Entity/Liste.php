<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Liste Entity.
 *
 * @property int $id
 * @property string $name
 * @property int $fournisseur_id
 * @property \App\Model\Entity\Fournisseur $fournisseur
 * @property \App\Model\Entity\Grille $grille
 * @property bool $active
 * @property bool $default
 * @property \Cake\I18n\Time $created
 * @property \App\Model\Entity\Listeitem[] $listeitems
 */
class Liste extends Entity
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

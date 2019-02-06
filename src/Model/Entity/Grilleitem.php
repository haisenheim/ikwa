<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Grilleitem Entity
 *
 * @property int $id
 * @property int $grille_id
 * @property int $min
 * @property int $max
 * @property int $coef
 *
 * @property \App\Model\Entity\Grille $grille
 */
class Grilleitem extends Entity
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
        'grille_id' => true,
        'min' => true,
        'max' => true,
        'coef' => true,
        'grille' => true
    ];
}

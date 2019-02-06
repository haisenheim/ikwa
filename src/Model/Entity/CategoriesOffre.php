<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * CategoriesOffre Entity
 *
 * @property int $id
 * @property int $category_id
 * @property int $offre_id
 * @property bool $statut
 *
 * @property \App\Model\Entity\Category $category
 * @property \App\Model\Entity\Offre $offre
 */
class CategoriesOffre extends Entity
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
        'category_id' => true,
        'offre_id' => true,
        'statut' => true,
        'category' => true,
        'offre' => true
    ];
}

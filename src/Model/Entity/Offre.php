<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Offre Entity.
 *
 * @property int $id
 * @property string $name
 * @property int $secteur_id
 * @property \App\Model\Entity\Secteur $secteur
 * @property int $category_id
 * @property \App\Model\Entity\Category $category
 * @property int $fournisseur_id
 * @property \App\Model\Entity\Fournisseur $fournisseur
 * @property int $prix_reel
 * @property int $prix_reduit
 * @property int $quota
 * @property int $duree
 * @property \Cake\I18n\Time $created
 * @property int $user_id
 * @property \App\Model\Entity\User $user
 * @property string $photo
 * @property string $description
 * @property bool $statut
 * @property \App\Model\Entity\Client[] $clients
 */
class Offre extends Entity
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
    protected function _getCat(){
        $r="";
        if(!empty($this->category)){
            $r=$this->category->name;
        }
        return $r;
    }

    protected function _getFourn(){
        $r="";
        if(!empty($this->fournisseur)){
            $r=$this->fournisseur->name;
        }
        return $r;
    }
}

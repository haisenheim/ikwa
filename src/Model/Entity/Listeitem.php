<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Listeitem Entity.
 *
 * @property int $id
 * @property int $offre_id
 * @property \App\Model\Entity\Offre $offre
 * @property int $liste_id
 * @property \App\Model\Entity\Liste $liste
 * @property int $prix_magasin
 * @property int $prix_ikwa
 * @property int $prix_vente_ikwa
 * @property \Cake\I18n\Time $date_limite
 */
class Listeitem extends Entity
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

    protected function _getTaux(){
        $t=$this->prix_magasin - $this->prix_ikwa;
        if($this->prix_magasin){
            $t= 100 * $t/$this->prix_magasin;
        }else{
            $t=0;
        }
        return $t;
    }

    protected function _getPrix(){
        $t=0;
        if($this->liste){
            if($this->liste->grille){
               // debug($t);
                foreach($this->liste->grille->grilleitems as $item){

                    if(($this->_getTaux() >= $item->min) && ($this->_getTaux() <= $item->max)){
                        $t = $this->prix_ikwa + $this->prix_ikwa* $item->coef/100;
                    }
                }
            }
            //die();
        }
        return $t;
    }
}

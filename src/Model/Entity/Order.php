<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Order Entity.
 *
 * @property int $id
 * @property int $name
 * @property \Cake\I18n\Time $created
 * @property int $user_id
 * @property int $status
 * @property \App\Model\Entity\Ordersitem[] $ordersitems
 */
class Order extends Entity
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


    /*protected function _getCreated(){
        return date_format(new \DateTime($this->_properties['created']) , 'd-m-Y H:i');
    }*/

    /*protected function _getDate_paie(){
        return date_format(new \DateTime($this->_properties['date_paie']) , 'd-m-Y H:i');
    }*/

    /*protected function _getDate_serve(){
        return date_format(new \DateTime($this->_properties['date_serve']) , 'd-m-Y H:i');
    }*/

    protected function _getTotal(){

        $t=0;

        if(!empty($this->ordersitems)){
            foreach($this->ordersitems as $oi){

                    $t=$t+ ($oi->prix_vente * $oi->quantity);

            }
        }

        return $t;
    }

    protected function _getMarge(){
        $t=0;

        if(!empty($this->ordersitems)){
            foreach($this->ordersitems as $oi){

                $t=$t+ ($oi->marge_ikwa * $oi->quantity);

            }
        }

        return $t;
    }

    protected function _getTotal_fournisseur(){
        $t=0;

        if(!empty($this->ordersitems)){
            foreach($this->ordersitems as $oi){

                $t=$t+ ($oi->prix_fournisseur * $oi->quantity);

            }
        }

        return $t;
    }


    public function _getStatut(){
        $st= $this->status;
        $rep="";
        switch($st){
            case 0 : $rep="NON PAYEE";
                break;
            case 1: $rep = "PAYEE";
                break;
            case 2: $rep = "SERVIE";
                break;
        }

        return $rep;
    }




}

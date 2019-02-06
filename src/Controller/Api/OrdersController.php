<?php
namespace App\Controller\Api;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\Mailer\Email;

class OrdersController extends AppController
{

    public function beforeFilter(Event $event){
        parent::beforeRender($event);
        $this->Auth->allow();
    }


//////////////////////////////////////////////////////////////////////////////////////

    public function save(){
        $panier = (Array)$this->request->getData();
        $items = (Array)$panier['linecarts'];
        $user_id = $panier['user_id'];
        $name = $panier['name'];
        $frn = $panier['fournisseur_id'];

        $order = $this->Orders->newEntity();
        $order->name = $name;
        $order->user_id=$user_id;
        $order->fournisseur_id= $frn;
        $order->status=1;
        $order->created = new \DateTime();
        $order = $this->Orders->save($order);
        $this->loadModel('Ordersitems');
        for($i=0; $i< count($items); $i++){
            $reservation = $this->Ordersitems->newEntity();
            $res= (Array)$items[$i];
            $reservation->quantity=$res['quantity'];
            $offre = (Array)$res['offre'];
            $reservation->offre_id=$offre['id'];
            $reservation->order_id=$order->id;
            $reservation->prix_vente=$offre['prix_vente'];
            $reservation->prix_fournisseur=$offre['prix_fournisseur'];
            $reservation->marge_ikwa=$offre['prix_vente'] - $offre['prix_fournisseur'];
            $retour[]=$reservation;
            $this->Ordersitems->save($reservation);
        }

        $panier= $this->Orders->find()->where(['Orders.id'=>$order->id])->contain(['Ordersitems.Offres', 'Fournisseurs.Villes'])->first();

        $this->RequestHandler->renderAs($this,'json');
        $this->set(compact('panier'));
        $this->set('_serialize', 'panier');
    }



    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    //
    //Paiement de la commande
    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    public function buy(){

        $order_id = $this->request->getQuery('order_id');
        $user_id = $this->request->getQuery('user_id');

        $order = $this->Orders->get($order_id, [
            'contain'=>['Ordersitems']
        ]);

        //debug("total: ".$order->total);
        //debug("total_fournisseur: ".$order->total_fournisseur);
        //debug("Marge_total: ".$order->marge);
        //debug("Somme Marge + total_frn ". ($order->total_fournisseur + $order->marge));
        $this->loadModel('Paiements');
        $paiement = $this->Paiements->newEntity();
        $paiement->order_id = $order->id;
        $paiement->fournisseur_id = $order->fournisseur_id;
        $paiement->created = new \DateTime();
        $paiement->user_id=$user_id;
        $paiement->marge_ikwa=$order->marge;
        $paiement->total_fournisseur=$order->total_fournisseur;
        $paiement->total=$order->total;
        $paiement->name = $order->id . date('ymdhi');
        $paiement =$this->Paiements->save($paiement);
        if($paiement){
            $order->paie = 1;
            $order->caissier_id=$user_id;
            $order->date_paie = new \DateTime();
            $order->paiement_id = $paiement->id;
            $order=$this->Orders->save($order);
        }

        $this->RequestHandler->renderAs($this,'json');
        $this->set(compact('order'));
        $this->set('_serialize', 'order');

    }


    public function testget(){
        /*$panier = $this->Orders->get(1,[
            'contain'=>['Ordersitems.Offres', 'Fournisseurs.Villes']
        ]);*/
        $panier= $this->Orders->find()->where(['Orders.id'=>1])->contain(['Ordersitems.Offres', 'Fournisseurs.Villes'])->first();
        /*$order = [];
        $order['name']=$panier->name;
        $order['id']=$panier->id;
        $order['created']=date_format($panier->created,'d/m/Y H:i');
        $order['fournisseur']=(Array)$panier->fournisseur;
        $items=[];

        $lines = $panier->ordersitems;
        foreach($lines as $line){
            $item=[];
            $item['quantity']=$line->quantity;
            $item['offre']=(Array)$line->offre;
            $item['prix_vente']=$line->prix_vente;
            $items[]=$item;
        }*/

       /* $order['ordersitems']=$items;

        $objData = serialize($panier);
        $filePath = "C:".DIRECTORY_SEPARATOR."xampp".DIRECTORY_SEPARATOR."htdocs" . DIRECTORY_SEPARATOR ."ikwa". DIRECTORY_SEPARATOR ."src". DIRECTORY_SEPARATOR ."Controller". DIRECTORY_SEPARATOR ."Api". DIRECTORY_SEPARATOR ."debug.txt";
        if (is_writable($filePath)) {
            $fp = fopen($filePath, "w");
            fwrite($fp, $objData);
            fclose($fp);
        }*/

        $this->RequestHandler->renderAs($this,'json');
        $this->set(compact('panier'));
        $this->set('_serialize', 'panier');
    }



    public function get(){
        $user_id=$this->request->getQuery('id');
        $panier=$this->Orders->find()->where(['user_id'=>$user_id])->contain(['Ordersitems.Offres','Fournisseurs.Villes'])->all();


        $this->RequestHandler->renderAs($this,'json');
        $this->set(compact('panier'));
        $this->set('_serialize', 'panier');
    }


    public function getByUser(){

    }


    /////////////////////////////////////////////////////////////////////////////////////////////////


    public function getByName(){
        $name=$this->request->getQuery('name');

        $order = $this->Orders->find()->where(['Orders.name'=>$name])->contain(['Ordersitems.Offres','Users','Fournisseurs'])->first();
        $this->RequestHandler->renderAs($this,'json');
        $this->set(compact('order'));
        $this->set('_serialize', 'order');
    }


}

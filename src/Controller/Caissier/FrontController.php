<?php
namespace App\Controller\Caissier;

use App\Controller\AppController;
use Cake\Collection\Collection;
use Cake\Event\Event;

/**
 * Slides Controller
 *
 * @property \App\Model\Table\SlidesTable $Slides
 */
class FrontController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */


   /* private function nameCode($value){
        $digits = [0=>"0", 1=>"1",2=>"2", 3=>"3", 4=>"4", 5=>"5", 6=>"6", 7=>"7",8=>"8",9=>"9",10=>"A",11=>"B",12=>"C",13=>"D",14=>"E",15=>"F",16=>"G",17=>"H",18=>"I",19=>"J",20=>"K",21=>"L",22=>"M",23=>"N",24=>"O",25=>"P",26=>"Q",27=>"R",28=>"S",29=>"T",30=>"U",31=>"V",32=>"W",33=>"X",34=>"Y",35=>"Z"];
        $name = "";
       // $p = () $value;
        while($p > 35){

            $r=(int)$p % 36;

            debug($r);
            //$m= (int)($r+ )

            $name = $name.$digits[$r];

            //debug( (int)($p - $r));

            $q = (int)($p - $r)/36;
            $p = $q;

            //debug($q);
        }

        return $name;
    }*/

    public function index()
    {

        if($this->request->is('post')){
            $id = $this->request->getData('order_name');
            $this->loadModel('Orders');
            $order = $this->Orders->find()->where(['Orders.name'=>$id])->contain(['Ordersitems.Offres','Users'])->last();
            if($order){
                if($order->paie){
                    $this->Flash->error("Cette commande a deja ete traitee ! Bien vouloir passer une nouvelle commande !");
                }
                else{
                    $this->loadModel('Orders');
                    $or = $this->Orders->get($order->id);
                    $or->caissier_id = $this->Auth->user()['id'];
                    $or->date_consultation=new \DateTime();
                    $or = $this->Orders->save($or);
                }
            }
            $this->set(compact('order'));


        }

    }

    public function payer(){
        if($this->request->is('post')){
            $percu = $this->request->getData('percu');
            $reste = $this->request->getData('reste');
            $this->loadModel('Paiements');
            $paiement = $this->Paiements->newEntity();
            $paiement->percu = $percu;
            //$paiement->reste= $reste;
            $paiement->order_id=$this->request->getData('order_id');
            $paiement->user_id=$this->Auth->user()['id'];
            $paiement->total=$this->request->getData('total');
            $paiement->name = date('dmyhis').$this->Auth->user()['id'];
            $paiement=$this->Paiements->save($paiement);
            if($paiement){
                $this->Flash->success('Paiement enregistre avec sucess !!!');
                $this->loadModel('Orders');
                $order = $this->Orders->get($this->request->getData('order_id'));
                $order->paie=1;
                $order->server_id = $this->Auth->user()['id'];
                $order->date_paie=new \DateTime();
                $order->paiement_id = $paiement->id;
                $order = $this->Orders->save($order);
            }else{
                $this->Flash->error('Erreur survenu lors de l\'enregistrement du paiement');
            }
            return $this->redirect(['action'=>'index']);
        }
    }


    public function searchOrderJson(){
        if($this->request->is('ajax')){
            $id = $this->request->getData('id');
            $this->loadModel('Orders');
            //$this->loadModel('Listes');
            $order = $this->Orders->find()->where(['Orders.name'=>$id])->contain(['Ordersitems.Offres','Users'])->last();
            $this->set(compact('order'));
            $this->set('_serialize',true);

        }
    }


}

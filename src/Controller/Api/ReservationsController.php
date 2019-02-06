<?php
namespace App\Controller\Api;

use App\Controller\AppController;
use Cake\Collection\Collection;
use Cake\Filesystem\Folder;
use PhpParser\Node\Expr\Array_;

/**
 * Reservations Controller
 *
 * @property \App\Model\Table\ReservationsTable $Reservations
 */
class ReservationsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $reservations = $this->Reservations->find()->contain(['Offres', 'Users','Points','Paiements'])->all();
        $this->RequestHandler->renderAs($this,'json');
        $this->set(compact('reservations'));
        $this->set('_serialize', 'reservations');
    }


    public function getByUser(){
        $user_id = $this->request->input('json_decode');
        $reservations = $this->Reservations->find()->where(['Reservations.user_id'=>$user_id])->contain(['Offres.Fournisseurs','Offres.Categories','Points','Users','Paiements'])->all();
        $this->RequestHandler->renderAs($this,'json');
        $this->set(compact('reservations'));
        $this->set('_serialize', 'reservations');
    }

    public function getByName(){
        $name = $this->request->data('name');
        $reservation = $this->Reservations->find()->where(['name'=>$name])->contain(['Offres','Points','Users'])->first();
        $this->RequestHandler->renderAs($this,'json');
        $this->set(compact('reservation'));
        $this->set('_serialize', 'reservation');
    }


    public function getByFournisseur($frn){
        $reservations = $this->Reservations->find()->contain(['Offres'=>function($q) use($frn){
          return  $q->where(['Offres.fournisseur_id'=>$frn]);
        } ,'Points','Paiements'])->all();
        $this->RequestHandler->renderAs($this,'json');
        $this->set(compact('reservations'));
        $this->set('_serialize', 'reservations');
    }


    public function getByPoint($pt){
        $reservations = $this->Reservations->find()->where(['point_id'=>$pt])->contain(['Offres','Paiements'])->all();
        $this->RequestHandler->renderAs($this,'json');
        $this->set(compact('reservations'));
        $this->set('_serialize', 'reservations');
    }

    public function groupByFournisseur(){
        $reservations=$this->Reservations->find()->contain(['Offres.Fournisseurs'])->all();

        $grp= new Collection($reservations);
        $grp = $grp->groupBy(function($q){
            return $q->offre->fournisseur->name;
        });

        $data=[];

        foreach($grp as $k=>$v){
            $som=0;
            foreach($v as $r){
                $som = $som + $r->quantite * $r->offre->prix_vente;
            }
            $data[$k]=$som;
        }

        $this->RequestHandler->renderAs($this,'json');
        $this->set(compact('data'));
        $this->set('_serialize', 'data');
    }

    public function get($id){
        $reservation = $this->Reservations
            ->get($id,[
                'contain'=>
                    ['Offres','Users']
            ]);

        $reservation->offre_name=$reservation->offre?$reservation->offre->name:"";
        $reservation->offre_pv=$reservation->offre?$reservation->offre->pv:"";
        $reservation->offre_pr=$reservation->offre?$reservation->offre->pr:"";
        $reservation->offre_photo=$reservation->offre?$reservation->offre->photo:"";

        $reservation->user_name=$reservation->user?$reservation->user->name:"";
        $reservation->user_telephone=$reservation->user?$reservation->user->telephone:"";
        $reservation->user_photo=$reservation->user?$reservation->user->photo:"";

        $this->RequestHandler->renderAs($this,'json');

        $this->set(compact('result'));
        $this->set('_serialize', 'result');
    }

    public function paie($id){
        $reservation = $this->Reservations
            ->get($id);
        $reservation->paie=1;
        $result=[];
        if($this->Reservations->save($reservation)){
            $result["success"]=1;
            $result["message"]="Paiement effectue avec succes!!!";
        }else{
            $result["success"]=0;
            $result["message"]="Erreur survenue lors de l'enregistrement du paiement";
        }
        $this->RequestHandler->renderAs($this,'json');

        $this->set(compact('result'));
        $this->set('_serialize', 'result');
    }


    public function test(){
        $data=['1','2'];
        //$rsv=$this->Reservations->find()->where(['Reservations.id in'=>$data])->contain(['Offres.Fournisseurs','Offres.Categories'])->all();
        $rsv=date('ydmHi')."28";
        $this->RequestHandler->renderAs($this,'json');
        $this->set(compact('rsv'));
        $this->set('_serialize', 'rsv');
    }




    // Ajout d'une nouvelle reservation
    public function save(){
        $reservations=$this->request->input('json_decode');


        $panier = $reservations;
        //$donnees= $this->request->data;
       // $reservations = $this->request->data('reservations');
        $user_id=$panier->user;
        $reservations= $panier->reservations;
        $data=[];
        $reservations=(Array)$reservations;

        for($i=0; $i< count($reservations); $i++){
            $reservation = $this->Reservations->newEntity();
            $res=$reservations[$i];
            $name = ($res->offre->id * $res->quantity) % 10;
            $reservation->name = $name . date_format(new \DateTime(), 'Hdymsi') . $i;
            $reservation->quantity=$res->quantity;
            $reservation->offre_id=$res->offre->id;
            $reservation->user_id=$user_id;
            $r=$this->Reservations->save($reservation);
            $data[]=$r->id;

        }

        $rsv=$this->Reservations->find()->where(['Reservations.id in'=>$data])->contain(['Offres.Fournisseurs','Offres.Categories'])->all();


        /*$objData = serialize($data);
        $filePath = "C:".DIRECTORY_SEPARATOR."xampp".DIRECTORY_SEPARATOR."htdocs" . DIRECTORY_SEPARATOR ."groupon". DIRECTORY_SEPARATOR ."src". DIRECTORY_SEPARATOR ."Controller". DIRECTORY_SEPARATOR ."Api". DIRECTORY_SEPARATOR ."debug.txt";
        if (is_writable($filePath)) {
            $fp = fopen($filePath, "w");
            fwrite($fp, $objData);
            fclose($fp);
        }*/


        $this->RequestHandler->renderAs($this,'json');
        $this->set(compact('rsv'));
        $this->set('_serialize', 'rsv');
    }

    /**
     * View method
     *
     * @param string|null $id Reservation id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $reservation = $this->Reservations->get($id, [
            'contain' => ['Offres', 'Clients', 'Points', 'Paiements']
        ]);

        $this->set('reservation', $reservation);
        $this->set('_serialize', ['reservation']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $reservation = $this->Reservations->newEntity();
        if ($this->request->is('post')) {
            $reservation = $this->Reservations->patchEntity($reservation, $this->request->data);
            if ($this->Reservations->save($reservation)) {
                $this->Flash->success(__('The reservation has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The reservation could not be saved. Please, try again.'));
            }
        }
        $offres = $this->Reservations->Offres->find('list', ['limit' => 200]);
        $clients = $this->Reservations->Clients->find('list', ['limit' => 200]);
        $points = $this->Reservations->Points->find('list', ['limit' => 200]);
        $paiements = $this->Reservations->Paiements->find('list', ['limit' => 200]);
        $this->set(compact('reservation', 'offres', 'clients', 'points', 'paiements'));
        $this->set('_serialize', ['reservation']);
    }



    /**
     * Edit method
     *
     * @param string|null $id Reservation id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $reservation = $this->Reservations->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $reservation = $this->Reservations->patchEntity($reservation, $this->request->data);
            if ($this->Reservations->save($reservation)) {
                $this->Flash->success(__('The reservation has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The reservation could not be saved. Please, try again.'));
            }
        }
        $offres = $this->Reservations->Offres->find('list', ['limit' => 200]);
        $clients = $this->Reservations->Clients->find('list', ['limit' => 200]);
        $points = $this->Reservations->Points->find('list', ['limit' => 200]);
        $paiements = $this->Reservations->Paiements->find('list', ['limit' => 200]);
        $this->set(compact('reservation', 'offres', 'clients', 'points', 'paiements'));
        $this->set('_serialize', ['reservation']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Reservation id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $reservation = $this->Reservations->get($id);
        if ($this->Reservations->delete($reservation)) {
            $this->Flash->success(__('The reservation has been deleted.'));
        } else {
            $this->Flash->error(__('The reservation could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}

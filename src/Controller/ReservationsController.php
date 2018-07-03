<?php
namespace App\Controller;

use App\Controller\AppController;

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
        $this->paginate = [
            'contain' => ['Offres', 'Clients', 'Points', 'Paiements']
        ];
        $reservations = $this->paginate($this->Reservations);

        $this->set(compact('reservations'));
        $this->set('_serialize', ['reservations']);
    }

    public function getAll()
    {
        $this->paginate = [
            'contain' => ['Offres','Users']
        ];


        $reservations = $this->paginate($this->Reservations);
        foreach($reservations as $offre){
            $offre->offre=$offre->offre?$offre->offre->name:"";
            $offre->user_name=$offre->user?$offre->user->name:"";
            $offre->user_telephone=$offre->user?$offre->user->telephone:"";
            $offre->user_photo=$offre->user?$offre->user->photo:"";
        }
        $this->RequestHandler->renderAs($this,'json');

        $this->set(compact('reservations'));
        $this->set('_serialize', 'reservations');
    }

    public function getByName($name){
        $reservation = $this->Reservations
            ->find()
            ->contain(['Offres','Users'])
            ->where(['name'=>$name])
            ->first();
            $reservation->offre_name=$reservation->offre?$reservation->offre->name:"";
            $reservation->offre_pv=$reservation->offre?$reservation->offre->pv:"";
            $reservation->offre_pr=$reservation->offre?$reservation->offre->pr:"";
            $reservation->offre_photo=$reservation->offre?$reservation->offre->photo:"";

            $reservation->user_name=$reservation->user?$reservation->user->name:"";
            $reservation->user_telephone=$reservation->user?$reservation->user->telephone:"";
            $reservation->user_photo=$reservation->user?$reservation->user->photo:"";

        $this->RequestHandler->renderAs($this,'json');
        $this->set(compact('reservation'));
        $this->set('_serialize', 'reservation');

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




    // Ajout d'une nouvelle reservation
    public function save(){
        $data = $this->request->data('data');
        $user_id=$this->request->data('user_id');
        if(empty($data)){
            $data=$this->request->input();
        }

        $i=0;
        $result=[];
        $result["success"]=1;
        $result["message"]="Items have been saved !!!";
        foreach($data as $d){
            $reservation = $this->Reservations->newEntity();
            $name = ($d['offre_id'] * $d['quantite']) % 10;
            $i++;
            $reservation->name = $name . date_format(new \DateTime(), 'Hdymsi') . $i;
            $reservation->quantite=$d['quantite'];
            $reservation->offre_id=$d['offre_id'];
            $reservation->user_id=$user_id;
            if(!($this->Reservations->save($reservation))){
                $result['success']=0;
                $result["message"]="Something went wrong !!!";
            }

            $this->RequestHandler->renderAs($this,'json');

            $this->set(compact('result'));
            $this->set('_serialize', 'result');


        }
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

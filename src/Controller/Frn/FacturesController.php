<?php
namespace App\Controller\Frn;

use App\Controller\AppController;

/**
 * Factures Controller
 *
 * @property \App\Model\Table\FacturesTable $Factures
 */
class FacturesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Fournisseurs', 'Points', 'Users','Orders.Ordersitems.Offres']
        ];
        $factures = $this->paginate($this->Factures->find()->where(['Factures.fournisseur_id'=>$this->Auth->user()['fournisseur_id'],'statut <'=>2]));
        $this->set(compact('factures'));
        $this->set('_serialize', ['factures']);
    }

    /**
     * View method
     *
     * @param string|null $id Facture id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $facture = $this->Factures->get($id, [
            'contain' => ['Fournisseurs', 'Points', 'Users', 'Orders.Users','Orders.Payers','Orders.Ordersitems.Offres']
        ]);

        $this->set('facture', $facture);
        $this->set('_serialize', ['facture']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $facture = $this->Factures->newEntity();
        if ($this->request->is('post')) {
            $facture = $this->Factures->patchEntity($facture, $this->request->data);
            if ($this->Factures->save($facture)) {
                $this->Flash->success(__('The facture has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The facture could not be saved. Please, try again.'));
            }
        }
        $fournisseurs = $this->Factures->Fournisseurs->find('list', ['limit' => 200]);
        $points = $this->Factures->Points->find('list', ['limit' => 200]);
        $users = $this->Factures->Users->find('list', ['limit' => 200]);
        $this->set(compact('facture', 'fournisseurs', 'points', 'users'));
        $this->set('_serialize', ['facture']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Facture id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $facture = $this->Factures->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $facture = $this->Factures->patchEntity($facture, $this->request->data);
            if ($this->Factures->save($facture)) {
                $this->Flash->success(__('The facture has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The facture could not be saved. Please, try again.'));
            }
        }
        $fournisseurs = $this->Factures->Fournisseurs->find('list', ['limit' => 200]);
        $points = $this->Factures->Points->find('list', ['limit' => 200]);
        $users = $this->Factures->Users->find('list', ['limit' => 200]);
        $this->set(compact('facture', 'fournisseurs', 'points', 'users'));
        $this->set('_serialize', ['facture']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Facture id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $facture = $this->Factures->get($id);
        if ($this->Factures->delete($facture)) {
            $this->Flash->success(__('The facture has been deleted.'));
        } else {
            $this->Flash->error(__('The facture could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}

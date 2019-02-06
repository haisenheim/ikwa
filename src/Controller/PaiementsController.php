<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Paiements Controller
 *
 * @property \App\Model\Table\PaiementsTable $Paiements
 *
 * @method \App\Model\Entity\Paiement[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PaiementsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Orders', 'Users']
        ];
        $paiements = $this->paginate($this->Paiements);

        $this->set(compact('paiements'));
    }

    /**
     * View method
     *
     * @param string|null $id Paiement id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $paiement = $this->Paiements->get($id, [
            'contain' => ['Orders', 'Users']
        ]);

        $this->set('paiement', $paiement);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $paiement = $this->Paiements->newEntity();
        if ($this->request->is('post')) {
            $paiement = $this->Paiements->patchEntity($paiement, $this->request->getData());
            if ($this->Paiements->save($paiement)) {
                $this->Flash->success(__('The paiement has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The paiement could not be saved. Please, try again.'));
        }
        $orders = $this->Paiements->Orders->find('list', ['limit' => 200]);
        $users = $this->Paiements->Users->find('list', ['limit' => 200]);
        $this->set(compact('paiement', 'orders', 'users'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Paiement id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $paiement = $this->Paiements->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $paiement = $this->Paiements->patchEntity($paiement, $this->request->getData());
            if ($this->Paiements->save($paiement)) {
                $this->Flash->success(__('The paiement has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The paiement could not be saved. Please, try again.'));
        }
        $orders = $this->Paiements->Orders->find('list', ['limit' => 200]);
        $users = $this->Paiements->Users->find('list', ['limit' => 200]);
        $this->set(compact('paiement', 'orders', 'users'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Paiement id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $paiement = $this->Paiements->get($id);
        if ($this->Paiements->delete($paiement)) {
            $this->Flash->success(__('The paiement has been deleted.'));
        } else {
            $this->Flash->error(__('The paiement could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}

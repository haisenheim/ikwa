<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Parametres Controller
 *
 * @property \App\Model\Table\ParametresTable $Parametres
 */
class ParametresController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $parametres = $this->paginate($this->Parametres);

        $this->set(compact('parametres'));
        $this->set('_serialize', ['parametres']);
    }

    /**
     * View method
     *
     * @param string|null $id Parametre id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $parametre = $this->Parametres->get($id, [
            'contain' => []
        ]);

        $this->set('parametre', $parametre);
        $this->set('_serialize', ['parametre']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $parametre = $this->Parametres->newEntity();
        if ($this->request->is('post')) {
            $parametre = $this->Parametres->patchEntity($parametre, $this->request->data);
            if ($this->Parametres->save($parametre)) {
                $this->Flash->success(__('The parametre has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The parametre could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('parametre'));
        $this->set('_serialize', ['parametre']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Parametre id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $parametre = $this->Parametres->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $parametre = $this->Parametres->patchEntity($parametre, $this->request->data);
            if ($this->Parametres->save($parametre)) {
                $this->Flash->success(__('The parametre has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The parametre could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('parametre'));
        $this->set('_serialize', ['parametre']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Parametre id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $parametre = $this->Parametres->get($id);
        if ($this->Parametres->delete($parametre)) {
            $this->Flash->success(__('The parametre has been deleted.'));
        } else {
            $this->Flash->error(__('The parametre could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}

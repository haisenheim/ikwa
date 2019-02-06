<?php
namespace App\Controller\Admin;

use App\Controller\AppController;

/**
 * Villes Controller
 *
 * @property \App\Model\Table\VillesTable $Villes
 */
class VillesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {

        $villes = $this->paginate($this->Villes);

        $this->set(compact('villes'));
        $this->set('_serialize', ['villes']);
    }

    /**
     * View method
     *
     * @param string|null $id Ville id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $ville = $this->Villes->get($id, [
            'contain' => ['Fournisseurs', 'Users']
        ]);

        $this->set('ville', $ville);
        $this->set('_serialize', ['ville']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $ville = $this->Villes->newEntity();
        if ($this->request->is('post')) {
            $ville = $this->Villes->patchEntity($ville, $this->request->data);
            if ($this->Villes->save($ville)) {
                $this->Flash->success(__('The ville has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The ville could not be saved. Please, try again.'));
            }
        }

        $this->set(compact('ville'));
        $this->set('_serialize', ['ville']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Ville id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $ville = $this->Villes->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $ville = $this->Villes->patchEntity($ville, $this->request->data);
            if ($this->Villes->save($ville)) {
                $this->Flash->success(__('The ville has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The ville could not be saved. Please, try again.'));
            }
        }
        $pays = $this->Villes->Pays->find('list', ['limit' => 200]);
        $this->set(compact('ville', 'pays'));
        $this->set('_serialize', ['ville']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Ville id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $ville = $this->Villes->get($id);
        if ($this->Villes->delete($ville)) {
            $this->Flash->success(__('The ville has been deleted.'));
        } else {
            $this->Flash->error(__('The ville could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}

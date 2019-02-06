<?php
namespace App\Controller\Admin;

use App\Controller\AppController;

/**
 * Listes Controller
 *
 * @property \App\Model\Table\ListesTable $Listes
 */
class ListesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Fournisseurs']
        ];
        $listes = $this->paginate($this->Listes);

        $this->set(compact('listes'));
        $this->set('_serialize', ['listes']);
    }

    /**
     * View method
     *
     * @param string|null $id Liste id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $liste = $this->Listes->get($id, [
            'contain' => ['Listeitems.Offres','Listeitems.Listes.Grilles.Grilleitems']
        ]);

        $this->set('liste', $liste);
        $this->set('_serialize', ['liste']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $liste = $this->Listes->newEntity();
        if ($this->request->is('post')) {
            $liste = $this->Listes->patchEntity($liste, $this->request->data);
            if ($this->Listes->save($liste)) {
                $this->Flash->success(__('The liste has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The liste could not be saved. Please, try again.'));
            }
        }
        $fournisseurs = $this->Listes->Fournisseurs->find('list', ['limit' => 200]);
        $this->set(compact('liste', 'fournisseurs'));
        $this->set('_serialize', ['liste']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Liste id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $liste = $this->Listes->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $liste = $this->Listes->patchEntity($liste, $this->request->data);
            if ($this->Listes->save($liste)) {
                $this->Flash->success(__('The liste has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The liste could not be saved. Please, try again.'));
            }
        }
        $fournisseurs = $this->Listes->Fournisseurs->find('list', ['limit' => 200]);
        $this->set(compact('liste', 'fournisseurs'));
        $this->set('_serialize', ['liste']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Liste id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $liste = $this->Listes->get($id);
        if ($this->Listes->delete($liste)) {
            $this->Flash->success(__('The liste has been deleted.'));
        } else {
            $this->Flash->error(__('The liste could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}

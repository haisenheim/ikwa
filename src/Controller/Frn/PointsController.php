<?php
namespace App\Controller\Frn;

use App\Controller\AppController;

/**
 * Points Controller
 *
 * @property \App\Model\Table\PointsTable $Points
 */
class PointsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $points = $this->paginate($this->Points);

        $this->set(compact('points'));
        $this->set('_serialize', ['points']);
    }

    /**
     * View method
     *
     * @param string|null $id Point id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $point = $this->Points->get($id, [
            'contain' => ['Paiements', 'Users']
        ]);

        $this->loadModel('Orders');

        $orders = $this->Orders->find()->contain(['Ordersitems.Offres',
            'Payers'])->all();


        $this->set(compact('orders'));

        $this->set('point', $point);
        $this->set('_serialize', ['point']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $point = $this->Points->newEntity();
        if ($this->request->is('post')) {
            //debug($this->request->data); die();
            $point = $this->Points->patchEntity($point, $this->request->data);
            if ($this->Points->save($point)) {
                $this->Flash->success(__('The point has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The point could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('point'));
        $this->set('_serialize', ['point']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Point id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $point = $this->Points->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $point = $this->Points->patchEntity($point, $this->request->data);
            if ($this->Points->save($point)) {
                $this->Flash->success(__('The point has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The point could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('point'));
        $this->set('_serialize', ['point']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Point id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $point = $this->Points->get($id);
        if ($this->Points->delete($point)) {
            $this->Flash->success(__('The point has been deleted.'));
        } else {
            $this->Flash->error(__('The point could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}

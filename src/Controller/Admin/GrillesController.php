<?php
namespace App\Controller\Admin;

use App\Controller\AppController;

/**
 * Grilles Controller
 *
 * @property \App\Model\Table\GrillesTable $Grilles
 *
 * @method \App\Model\Entity\Grille[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class GrillesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users']
        ];
        $grilles = $this->paginate($this->Grilles);

        $this->set(compact('grilles'));
    }

    /**
     * View method
     *
     * @param string|null $id Grille id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $grille = $this->Grilles->get($id, [
            'contain' => ['Users', 'Grilleitems','Listes.Fournisseurs']
        ]);

        $this->set('grille', $grille);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $grille = $this->Grilles->newEntity();
        if ($this->request->is('post')) {
            $grille = $this->Grilles->patchEntity($grille, $this->request->getData());
            if ($this->Grilles->save($grille)) {
                $this->Flash->success(__('The grille has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The grille could not be saved. Please, try again.'));
        }
        $this->set(compact('grille'));
    }

    public function saveJson(){
        if($this->request->is('ajax')){
            $items = $this->request->getData('items');
            //debug($items); die();
            $grille = $this->Grilles->newEntity();

            $g=$this->Grilles->find()->where(['actuel'=>1])->first();
            if(!$g){
                $grille->actuel=1;
            }
            $grille->name=date('dmyhm');
            $grille->user_id=$this->Auth->user()['id'];
            $grille=$this->Grilles->save($grille);
            $id=$grille->id;
            if($grille){
                foreach($items as $item){
                    $it=$this->Grilles->Grilleitems->newEntity();
                    $it->grille_id=$id;
                    $it->coef=$item['coef'];
                    $it->max=$item['max'];
                    $it->min=$item['min'];
                    $it=$this->Grilles->Grilleitems->save($it);
                }
            }
        }

        $this->set(compact('id'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Grille id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $grille = $this->Grilles->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $grille = $this->Grilles->patchEntity($grille, $this->request->getData());
            if ($this->Grilles->save($grille)) {
                $this->Flash->success(__('The grille has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The grille could not be saved. Please, try again.'));
        }
        $users = $this->Grilles->Users->find('list', ['limit' => 200]);
        $this->set(compact('grille', 'users'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Grille id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $grille = $this->Grilles->get($id);
        if ($this->Grilles->delete($grille)) {
            $this->Flash->success(__('The grille has been deleted.'));
        } else {
            $this->Flash->error(__('The grille could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}

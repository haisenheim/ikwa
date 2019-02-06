<?php
namespace App\Controller\Api;

use App\Controller\AppController;
use Cake\Event\Event;

/**
 * Categories Controller
 *
 * @property \App\Model\Table\CategoriesTable $Categories
 */
class CategoriesController extends AppController
{

    public function beforeFilter(Event $event){
        parent::beforeRender($event)    ;
        $this->Auth->allow(['show','getAll','getOffres']);
    }


    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $categories = $this->paginate($this->Categories);

        $this->set(compact('categories'));
        $this->set('_serialize', ['categories']);
    }

    public function getAll()
    {
        $categories = $this->Categories->find('all');

        //debug('I am here !!!'); die();

        $this->RequestHandler->renderAs($this,'json');

        $this->set(compact('categories'));
        $this->set('_serialize', 'categories');
    }


    public function getOffres()
    {
        $cat_id = $this->request->input('json_decode');

        $offres = $this->Categories->Offres->find()->where(['category_id'=>$cat_id])->contain(['Categories','Fournisseurs'])->all();

        //debug('I am here !!!'); die();

        $this->RequestHandler->renderAs($this,'json');

        $this->set(compact('offres'));
        $this->set('_serialize', 'offres');
    }

    /**
     * View method
     *
     * @param string|null $id Category id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $category = $this->Categories->get($id, [
            'contain' => ['Offres.Secteurs','Offres.Fournisseurs']
        ]);

        $this->set('category', $category);
        $this->set('_serialize', ['category']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */

    public function add()
    {
        $topic = $this->Categories->newEntity();
        //if the user topics data to your application, the POST request  informations are registered in $this->request
        if ($this->request->is('post')) { //
            $data = $this->request->input('json_decode');
            $data=(Array)$data;
            $topic = $this->Categories->patchEntity($topic, $data);
           // $data=$this->request->input('json_decode');
            //debug($this->request->contentType());


            //debug($data);
            //die();
           // $topic->user_id = $this->Auth->user('id');
            if ($this->Categories->save($topic)) {

                $message = 'Category saved';
            }else{
                $message = 'Something went wrong';
            }
        }
        $this->set([
            'message' => $message,
            'topic' => $topic,
            '_serialize' => ['message', 'topic']
        ]);
    }



    public function add_save()
    {
        $category = $this->Categories->newEntity();
        if ($this->request->is('post')) {
            $category = $this->Categories->patchEntity($category, $this->request->data);
           // debug($this->request->input()); die();
            if ($category=$this->Categories->save($category)) {
                $this->Flash->success(__('The category has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The category could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('category'));
        $this->set('_serialize', ['category']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Category id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $category = $this->Categories->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $category = $this->Categories->patchEntity($category, $this->request->data);
            if ($this->Categories->save($category)) {
                $this->Flash->success(__('The category has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The category could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('category'));
        $this->set('_serialize', ['category']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Category id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $category = $this->Categories->get($id);
        if ($this->Categories->delete($category)) {
            $this->Flash->success(__('The category has been deleted.'));
        } else {
            $this->Flash->error(__('The category could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}

<?php
namespace App\Controller\Frn;

use App\Controller\AppController;
use Cake\Event\Event;

/**
 * Categories Controller
 *
 * @property \App\Model\Table\CategoriesTable $Categories
 */
class CategoriesController extends AppController
{



    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $categories = $this->paginate($this->Categories->find()->where(['fournisseur_id'=>$this->Auth->user()['fournisseur_id']]));

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
            'contain' => ['Offres']
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
        $category = $this->Categories->newEntity();
        //if the user topics data to your application, the POST request  informations are registered in $this->request
        if ($this->request->is('post')) { //

            $category = $this->Categories->patchEntity($category, $this->request->data);
            $category->fournisseur_id = $this->Auth->user()['fournisseur_id'];
            $category = $this->Categories->save($category);
            if ($this->Categories->save($category)) {
                $this->Flash->success(__('Une nouvelle categorie a ete creee dans votre compte IKWA.'));
                if(!empty($this->request->data['photo']['name'])){
                    $file = $this->request->data['photo'];
                    $ext = substr(strtolower(strrchr($file['name'],'.')),1);
                    $arr_ext = array('jpg','png','jpeg','gif');
                    if(in_array($ext,$arr_ext)){
                        if(!file_exists(WWW_ROOT.'img'.DS.'categories')){
                            mkdir(WWW_ROOT.'img'.DS.'categories');
                        }
                        if(file_exists(WWW_ROOT.'img'.DS.'categories'.DS.$category->id.'.'.$ext)){
                            unlink(WWW_ROOT.'img'.DS.'categories'.DS.$category->id.'.'.$ext);
                        }
                        $name = $category->id;

                        move_uploaded_file($file['tmp_name'], WWW_ROOT.'img'.DS.'categories'.DS.$name.'.'.$ext);

                        $category->imageUri = 'categories/'.$name.'.'.$ext;
                        $this->Categories->save($category);
                    }

                }
                return $this->redirect(['action' => 'index']);
            }
            else {
                $this->Flash->error(__('The category could not be saved. Please, try again.'));
            }

        }

        $this->set(compact('category'));

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

<?php
namespace App\Controller\Admin;

use App\Controller\AppController;

/**
 * Groupes Controller
 *
 * @property \App\Model\Table\GroupesTable $Groupes
 *
 * @method \App\Model\Entity\Groupe[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class GroupesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $groupes = $this->paginate($this->Groupes);

        $this->set(compact('groupes'));
    }

    /**
     * View method
     *
     * @param string|null $id Groupe id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $groupe = $this->Groupes->get($id, [
            'contain' => ['Fournisseurs']
        ]);

        $this->set('groupe', $groupe);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $groupe = $this->Groupes->newEntity();

            if ($this->request->is('post')) {

                if($this->request->getData('password') != $this->request->getData('cpassword')){
                    $this->Flash->error('Les mots de passe ne correspondent pas !!!');
                    return $this->redirect($this->referer());
                }

                $groupe = $this->Groupes->patchEntity($groupe, $this->request->getData());
                $groupe = $this->Groupes->save($groupe);

                if($groupe){
                    if(!empty($this->request->getData()['photo']['name'])){
                        $file = $this->request->getData()['photo'];
                        $ext = substr(strtolower(strrchr($file['name'],'.')),1);
                        $arr_ext = array('jpg','png','jpeg','gif');
                        if(in_array($ext,$arr_ext)){
                            if(!file_exists(WWW_ROOT.'img'.DS.'groupes')){
                                mkdir(WWW_ROOT.'img'.DS.'groupes');
                            }

                            if(file_exists(WWW_ROOT.'img'.DS.'groupes'.DS.$groupe->id.'.'.$ext)){
                                unlink(WWW_ROOT.'img'.DS.'groupes'.DS.$groupe->id.'.'.$ext);
                            }

                            // $name = $file['name'].time();
                            $name = $groupe->id;

                            move_uploaded_file($file['tmp_name'], WWW_ROOT.'img'.DS.'groupes'.DS.$name.'.'.$ext);

                            $groupe->imageUri = 'groupes/'.$name.'.'.$ext;
                            $this->Groupes->save($groupe);
                        }

                    }

                    $this->loadModel('Users');
                    $us = $this->Users->newEntity();
                    $us->name = $this->request->getData('last_name')."  ".$this->request->getData('first_name');
                    $us->last_name= $this->request->getData('last_name');
                    $us->first_name= $this->request->getData('first_name');
                    $us->phone= $this->request->getData('user_phone');
                    $us->email= $this->request->getData('user_email');
                    $us->password= $this->request->getData('password');
                    $us->active=1;
                    $us->role_id=3;
                    $us->groupe_id=$groupe->id;

                    if ($this->Users->save($us)) {

                        if(!empty($this->request->getData()['user_photo']['name'])){
                            $file = $this->request->getData()['user_photo'];
                            $ext = substr(strtolower(strrchr($file['name'],'.')),1);
                            $arr_ext = array('jpg','png','jpeg','gif');
                            if(in_array($ext,$arr_ext)){
                                if(!file_exists(WWW_ROOT.'img'.DS.'users')){
                                    mkdir(WWW_ROOT.'img'.DS.'users');
                                }

                                if(file_exists(WWW_ROOT.'img'.DS.'users'.DS.$us->id.'.'.$ext)){
                                    unlink(WWW_ROOT.'img'.DS.'users'.DS.$us->id.'.'.$ext);
                                }

                                // $name = $file['name'].time();
                                $name = $us->id;

                                move_uploaded_file($file['tmp_name'], WWW_ROOT.'img'.DS.'users'.DS.$name.'.'.$ext);

                                $us->imageUri = 'users/'.$name.'.'.$ext;
                                $this->Users->save($us);
                            }

                        }

                    }
                    else {
                        $this->Flash->error(__('L\'utilisateur n\'a pas pu etre cree !!!'));
                    }
                    $this->Flash->success('Le groupe a ete cree avec succes !!!');
                    return $this->redirect(['action' => 'index']);
                }



            }



         $this->set(compact('groupe'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Groupe id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $groupe = $this->Groupes->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $groupe = $this->Groupes->patchEntity($groupe, $this->request->getData());
            if ($this->Groupes->save($groupe)) {
                $this->Flash->success(__('The groupe has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The groupe could not be saved. Please, try again.'));
        }
        $this->set(compact('groupe'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Groupe id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $groupe = $this->Groupes->get($id);
        if ($this->Groupes->delete($groupe)) {
            $this->Flash->success(__('The groupe has been deleted.'));
        } else {
            $this->Flash->error(__('The groupe could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}

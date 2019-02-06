<?php
namespace App\Controller\Admin;

use App\Controller\AppController;

class UsersController extends AppController {

////////////////////////////////////////////////////////////////////////////////

    public function dashboard() {
    }

////////////////////////////////////////////////////////////////////////////////

    public function index() {

        $users=$this->Users->find()->where(['role_id in'=>[1,2,3,4]])->contain(['Fournisseurs','Groupes','Roles'])->all();

        $this->set(compact('users'));

    }

    public function client() {

        $this->paginate = [
            'limit'=>20
        ];

        $users= $this->paginate($this->Users->find()->where(['role_id'=>5]));

        $this->set(compact('users'));

    }

////////////////////////////////////////////////////////////////////////////////

    public function view($id = null) {
        $user = $this->Users->get($id, [
            'contain' => []
        ]);
        $this->set(compact('user'));

    }

////////////////////////////////////////////////////////////////////////////////

    public function add() {
        $us = $this->Users->newEntity($this->request->getData());
        if ($this->request->is('post')) {
            if($this->request->getData('password') != $this->request->getData('cpassword')){
                $this->Flash->error('Les mots de passe ne correspondent pas !!!');
                return $this->redirect($this->referer());
            }

            $us = $this->Users->patchEntity($us, $this->request->getData());
            $us->name = $this->request->getData('last_name')."  ".$this->request->getData('first_name');
            $us->active=1;
            $us->role_id=1;

            if ($this->Users->save($us)) {
                $this->Flash->success(__('l\'utilisateur a ete cree avec succes !!!'));
                if(!empty($this->request->getData()['photo']['name'])){
                    $file = $this->request->getData()['photo'];
                    $ext = substr(strtolower(strrchr($file['name'],'.')),1);
                    $arr_ext = array('jpg','png','jpeg','gif');
                    if(in_array($ext,$arr_ext)){
                        if(!file_exists(WWW_ROOT.'img'.DS.'users')){
                            mkdir(WWW_ROOT.'img'.DS.'users');
                        }

                        if(file_exists(WWW_ROOT.'img'.DS.'users'.DS.$us->id.'.'.$ext)){
                            unlink(WWW_ROOT.'img'.DS.'users'.DS.$us->id.'.'.$ext);
                        }

                        $name = $us->id;

                        move_uploaded_file($file['tmp_name'], WWW_ROOT.'img'.DS.'users'.DS.$name.'.'.$ext);

                        $us->imageUri = 'users/'.$name.'.'.$ext;
                        $this->Users->save($us);
                    }

                }
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('L\'utilisateur n\'a pas pu etre cree !!!'));
            }

        }
        $this->set(compact('us'));
    }

////////////////////////////////////////////////////////////////////////////////

    public function edit($id = null) {
        $us = $this->Users->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $us = $this->Users->patchEntity($us, $this->request->data);
            if ($this->Users->save($us)) {
                $this->Flash->success('The user has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The user could not be saved. Please, try again.');
            }
        }
        $this->set(compact('us'));
    }

////////////////////////////////////////////////////////////////////////////////

    public function password($id = null) {
        $user = $this->Users->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->data);
            if ($this->Users->save($user)) {
                $this->Flash->success('The user has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The user could not be saved. Please, try again.');
            }
        }
        $this->set(compact('user'));
    }

////////////////////////////////////////////////////////////////////////////////

    public function delete($id = null) {
        $user = $this->Users->get($id);
        $this->request->allowMethod('post', 'delete');
        if ($this->Users->delete($user)) {
            $this->Flash->success('The user has been deleted.');
        } else {
            $this->Flash->error('The user could not be deleted. Please, try again.');
        }
        return $this->redirect(['action' => 'index']);
    }

////////////////////////////////////////////////////////////////////////////////

////////////////////////////////////////////////////////////////////////////////

    public function logout()
    {
        $this->Flash->success('Aurevoir !!!');
        return $this->redirect($this->Auth->logout());
    }

////////////////////////////////////////////////////////////////////////////////

}

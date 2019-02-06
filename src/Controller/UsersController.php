<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Auth\DefaultPasswordHasher;
use Cake\Event\Event;
use Cake\Mailer\Email;
// use Cake\Auth\DefaultPasswordHasher;


class UsersController extends AppController {

    ////////////////////////////////////////////////////////



    public function beforeFilter(Event $event){
        parent::beforeRender($event);
        $this->Auth->allow(['login']);
    }


    public function signin(){

        if ($this->request->is('post')) {
            $user = $this->Auth->identify();

            //debug($user); die();

            if ($user) {

                $u = $this->Users->newEntity();
                $u->id = $user['id'];
                $u->login_count = $user['login_count'] + 1;
                $u->login_last = date('Y-m-d H:i:s');
                $this->Users->save($u);

                $this->Auth->setUser($user);
                if ($user['role_id'] == 2) {
                    return $this->redirect(['controller'=>'offres','action'=>'index','prefix'=>'frn']);
                }

                if ($user['role_id'] == 4) {
                    return $this->redirect(['controller'=>'orders','action'=>'index','prefix'=>'pv']);
                }

                if ($user['role_id'] == 1) {
                    return $this->redirect([
                        'controller' => 'users',
                        'action' => 'index',
                        'prefix' => 'admin',
                    ]);
                }

            } else {
                $this->Flash->error('Nom d\'utilisateur ou mot de passe incorrect', 'default', [], 'auth');
                return $this->redirect(['action'=>'login']);
            }
        }
    }










////////////////////////////////////////////////////////////////////////////////

    public function login()
    {
        if ($this->request->is('post')) {
            $user = $this->Auth->identify();
            if ($user) {
                $this->Auth->setUser($user);
                if($user['role_id']==1){
                    return $this->redirect(['controller'=>'Front','action'=>'index','prefix'=>'admin']);
                }
                if($user['role_id']==2){
                    return $this->redirect(['controller'=>'Front','action'=>'index','prefix'=>'frn']);
                }
                if($user['role_id']==3){
                    return $this->redirect(['controller'=>'Front','action'=>'index','prefix'=>'grp']);
                }
                if($user['role_id']==4){
                    return $this->redirect(['controller'=>'Front','action'=>'index','prefix'=>'caissier']);
                }
                return $this->redirect($this->Auth->redirectUrl());
            }
            $this->Flash->error('Votre username ou mot de passe est incorrect.');
        }
    }




//////////////////////////////////////////////////////////////////////////////


    public function logout()
    {
        $this->Flash->success('Good-Bye');
        return $this->redirect($this->Auth->logout());
    }

////////////////////////////////////////////////////////////////////////////////

}

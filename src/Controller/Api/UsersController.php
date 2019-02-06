<?php
namespace App\Controller\Api;

use App\Controller\AppController;
use Cake\Auth\DefaultPasswordHasher;
use Cake\Event\Event;
use Cake\Mailer\Email;
// use Cake\Auth\DefaultPasswordHasher;


class UsersController extends AppController {


    public function beforeFilter(Event $event){
        parent::beforeRender($event);
        $this->Auth->allow(['signin','signup','signinfrn']);
    }

////////////////////////////////////////////////////////////////////////////////

    public function login()
    {
        // $passwordHasher = new DefaultPasswordHasher();
        // echo $passwordHasher->hash('admin');
        // $this->loadComponent('Auth');

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
                    return $this->redirect($this->referer(['prefix'=>'user']));
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
            }
        }
        $title_for_layout = 'Sign in';
        $description = 'Sign in';
        $keywords = '';
        $this->set(compact('title_for_layout', 'description', 'keywords'));
    }




//////////////////////////////////////////////////////////////////////////////

 public function signup(){

     $user = $this->Users->newEntity();
     $user->last_name=$this->request->getQuery('lastname');
     $user->first_name=$this->request->getQuery('firstname');
     $user->phone=$this->request->getQuery('phone');
     $user->password=$this->request->getQuery('password');
     $user->ville_id=$this->request->getQuery('ville_id');
     $user->role_id=5;
     $user->active=1;
     $user->created = new \DateTime();
     $user->name=$this->request->getQuery('firstname') . " " . $this->request->getQuery('lastname');
     $user = $this->Users->save($user);
     $this->RequestHandler->renderAs($this,'json');
     $this->set(compact('user'));
     $this->set('_serialize', 'user');
 }



///////////////////////////////////////////////////////////////////////////////

//Fonction d'enregistrement d'un utilisateur


/////////////////////////////////////////////////////////////////////////////

public function signin(){

      // debug($this->request->getQuery('phone'));
        $phone =$this->request->getQuery('phone');
        $pass= $this->request->getQuery('password');

        if(!empty($phone)){
            $hasher = new DefaultPasswordHasher();
            $us = $this->Users->find()->where(['phone'=>$phone])->first();
            if(!empty($us)){
                $match = $hasher->check($pass,$us->password);
                //debug($pass);
                //debug($match);
                if($match){
                    $us->login_count = $us['login_count'] + 1;
                    $us->login_last = date('Y-m-d H:i:s');
                    $us= $this->Users->save($us);
                }else{
                    $us=null;
                }
            }
        }

    $this->RequestHandler->renderAs($this,'json');
    $this->set(compact('us'));
    $this->set('_serialize', 'us');
}

    /////////////////////////////////////////////////////////////////////////////

    public function signinfrn(){

        // debug($this->request->getQuery('phone'));
        $phone =$this->request->getQuery('phone');
        $pass= $this->request->getQuery('password');

        if(!empty($phone)){
            $hasher = new DefaultPasswordHasher();
            $us = $this->Users->find()->where(['phone'=>$phone])->first();
            if(!empty($us)){
                $match = $hasher->check($pass,$us->password);
                //debug($pass);
                //debug($match);
                if($match && ($us->fournisseur_id>0)){
                    $us->login_count = $us['login_count'] + 1;
                    $us->login_last = date('Y-m-d H:i:s');
                    $us= $this->Users->save($us);
                }else{
                    $us=null;
                }
            }
        }

        $this->RequestHandler->renderAs($this,'json');
        $this->set(compact('us'));
        $this->set('_serialize', 'us');
    }

////////////////////////////////////////////////////////////////////////////////

    public function logout()
    {
        $this->Flash->success('Vous etes maintenant deconnecte !!!');
        return $this->redirect($this->Auth->logout());
    }

////////////////////////////////////////////////////////////////////////////////

}

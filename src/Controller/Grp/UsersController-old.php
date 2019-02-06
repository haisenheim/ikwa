<?php
namespace App\Controller\Grp;

use App\Controller\AppController;
use Cake\Auth\DefaultPasswordHasher;
use Cake\Mailer\Email;
// use Cake\Auth\DefaultPasswordHasher;


class UsersController extends AppController {

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

                if ($user['role_id'] == 4) {
                    return $this->redirect(['prefix'=>'pv']);
                }

                if ($user['role_id'] == 2) {
                    return $this->redirect(['controller'=>'offres','action'=>'index','prefix'=>'frn']);
                }

                if ($user['role_id'] == 4) {
                    return $this->redirect(['controller'=>'orders','action'=>'index','prefix'=>'frn']);
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

     if ($this->request->is('post')) {

         $data = $this->request->input('json_decode');
         $data=(Array)$data;
         if(empty($data)){
             $data=$this->request->data;
         }


         $user = $this->Users->newEntity();
         if (!empty($data)){

             $user->last_name=$data['last_name'];
             $user->first_name=$data['first_name'];
             $user->telephone=$data['phone'];
             $user->login_count=1;
             $user->password=$data['password'];
             $user->role_id=2;
             $user->email=$data['email'];
             $user->username=$data['email'];
             $user->gender=$data['gender'];
             $user->name=$data['first_name'] . " " . $data['last_name'];

             $user = $this->Users->save($user);
         }
     }

     $this->RequestHandler->renderAs($this,'json');
     $this->set(compact('user'));
     $this->set('_serialize', 'user');
 }



///////////////////////////////////////////////////////////////////////////////

//Fonction d'enregistrement d'un utilisateur


public function register(){

    $result=[];
    if($this->request->is('post')){

        $user=$this->Users->newEntity();
        $data = $this->request->input('json_decode');
        $data=(Array)$data;
        if(empty($data)){
            $data=$this->request->data;
        }
        $topic = $this->Users->patchEntity($user, $data);
        $token=md5($this->request->data('email').$this->request->data('name').date('YHdm'));
        $user->token=$token;
        $user->username=$this->request->data('email');
        $user->role_id=2;
        $donnees=$this->request->data;

       // $result=[];
        $user=$this->Users->save($topic);

        if (!empty($user)) {

            $result["success"] = "1";
            $result["message"]="success";
            $result['token']=$user->token;
        }else{
            $result["message"]="Error";
            $result["success"] = "0";
        }
    }else{
        $result["success"]="5";
        $result["message"]="N'ai pas une requete post";
    }

    $this->set([
        'data'=>$data,
        'donnees'=>$donnees,
        'message' => $result,
        'token' => $topic,
        '_serialize' => ['message', 'topic','data','donnees']
    ]);
    }


/////////////////////////////////////////////////////////////////////////////

public function loginByPhone(){

    if ($this->request->is('post')) {
        //$user = $this->Auth->identify();

        //debug($user); die();

        $data = $this->request->input('json_decode');
        $data=(Array)$data;
        if(empty($data)){
            $data=$this->request->data;
        }
        if (!empty($data)){
            $user = $this->Users->newEntity();
            $user->id=0;
            $user->name="xxxx";
            $user->telephone="000000";
            $this->password="zzzzzz";
            $hasher = new DefaultPasswordHasher();
            $user = $this->Users->find()->where(['telephone'=>$data['phone']])->first();
            if(!empty($user)){
                $password=$user->password;
                $match = $hasher->check($data['password'],$password);
                if($match){
                   /* $result["success"] = "1";
                    $result["message"]="success";
                    $result['token']=$user->token;
                    $result["user_id"]=$user->id;
                    $result["role_id"]=$user->role_id;*/
                    $user->login_count = $user['login_count'] + 1;
                    $user->login_last = date('Y-m-d H:i:s');
                    $user= $this->Users->save($user);
                }else{
                    $result["message"]="Utlisateur non trouve";
                   // $result['donnees']=$data;
                    $result["success"] = "0";

                }


            }else{
                $result["message"]="Utlisateur non trouve";
                //$result['donnees']=$data;
                $result["success"] = "0";

            }

        } else {
            $result["message"]="Error";
            $result["success"] = "0";
            $result["donnees"]=$data;
        }
    }

    $this->RequestHandler->renderAs($this,'json');
    $this->set(compact('user'));
    $this->set('_serialize', 'user');
}
////////////////////////////////////////////////////////////////////////////////

    public function logout()
    {
        $this->Flash->success('Good-Bye');
        return $this->redirect($this->Auth->logout());
    }

////////////////////////////////////////////////////////////////////////////////

}

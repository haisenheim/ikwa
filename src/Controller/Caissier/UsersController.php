<?php
namespace App\Controller\Caissier;

use App\Controller\AppController;
use Cake\Auth\DefaultPasswordHasher;
use Cake\Event\Event;
use Cake\Mailer\Email;
// use Cake\Auth\DefaultPasswordHasher;


class UsersController extends AppController {


//////////////////////////////////////////////////////////////////////////////


    public function logout()
    {
        $this->Flash->success('Good-Bye');
        return $this->redirect($this->Auth->logout());
    }

////////////////////////////////////////////////////////////////////////////////


    public function profile(){
        $user = $this->Users->get($this->Auth->user()['id']);
        $this->set(compact('user'));
    }

    public function edit(){
        $user = $this->Users->get($this->Auth->user()['id']);
        if($this->request->is('post')){
            $request = $this->request;
            $user->last_name = $request->getData('last_name') ? $request->getData('last_name'):'-';
            $user->first_name = $request->getData('first_name') ?$request->getData('first_name'):'-' ;
            $user ->name = $request->getData('last_name') . "  " .$request->getData('first_name');
            $user->phone=$request->getData('phone');
            if($request->getData('password')!=''){
                $user->password=$request->getData('password');
            }

            $user->email=$request->getData('email');

            $user= $this->Users->save($user);
            if($user){
                $this->Flash->success(__('Votre profile a ete mis a jour'));
                if(!empty($request->getData()['photo']['name'])){
                    $file = $request->getData()['photo'];
                    $ext = substr(strtolower(strrchr($file['name'],'.')),1);
                    $arr_ext = array('jpg','png','jpeg','gif');
                    if(in_array($ext,$arr_ext)){
                        if(!file_exists(WWW_ROOT.'img'.DS.'users')){
                            mkdir(WWW_ROOT.'img'.DS.'users');
                        }
                        if(file_exists(WWW_ROOT.'img'.DS.'users'.DS.$user->id.'.'.$ext)){
                            unlink(WWW_ROOT.'img'.DS.'users'.DS.$user->id.'.'.$ext);
                        }
                        $name = $user->id;
                        move_uploaded_file($file['tmp_name'], WWW_ROOT.'img'.DS.'users'.DS.$name.'.'.$ext);
                        $user->imageUri = 'users/'.$name.'.'.$ext;
                        $this->Users->save($user);
                    }

                }
            }

        }

        $this->set(compact('user'));
    }


}

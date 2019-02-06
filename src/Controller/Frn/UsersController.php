<?php
namespace App\Controller\Frn;

use App\Controller\AppController;
use Cake\Auth\DefaultPasswordHasher;
use Cake\Mailer\Email;
// use Cake\Auth\DefaultPasswordHasher;


class UsersController extends AppController {


    public function index(){
        $users=$this->Users->find()->where(['fournisseur_id'=>$this->Auth->user()['fournisseur_id'],'role_id'=>4]);
        $this->set(compact('users'));
    }

    public function logout()
    {
        $this->Flash->success('Aurevoir');
        return $this->redirect($this->Auth->logout());
    }

////////////////////////////////////////////////////////////////////////////////



    public function disable($id){
        $client=$this->Users->get($id);
        $client->active=0;
        $client=$this->Users->save($client);
        if($client){
            $this->Flash->success('Blocage fait avec succes !!!');
            return $this->redirect(['action'=>'index']);
        }

        $this->Flash->error('Echec au moment de la desactivation !!!');
    }

    ///////////////////////////////////////////////////////////////////////////////////////////////////////////

    public function enable($id){
        $client=$this->Users->get($id);
        $client->active=1;
        $client=$this->Users->save($client);
        if($client){
            $this->Flash->success('Deblocage fait avec succes !!!');
            return $this->redirect(['action'=>'index']);
        }

        $this->Flash->error('Echec au moment de la Reactivation !!!');
    }
    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    /**
     * View method
     *
     * @param string|null $id User id.

     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => ['Roles']
        ]);

        $this->set('user', $user);
    }

    /**
     * Add method
     *

     */
    public function add()
    {
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            $user->fournisseur_id=$this->Auth->user()['fournisseur_id'];
            $user->active = 1;
            $user->name = $this->request->getData('first_name')."  ".$this->request->getData('last_name');
            $user->role_id=4;
            if ($this->Users->save($user)) {
                $this->Flash->success(__('Enregistrement fait avec succes !!!.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Une erreur est survenue lors de l\'enregistrement de l\'utilisateur.'));
        }

        $this->set(compact('user'));
    }

    /**
     * Edit method
     *
     * @param string|null $id User id.

     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->data());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }

        $this->set(compact('user'));
    }

    ////////////////////////////////////////////////////////////////////

    public function profile()
    {
        $id=$this->Auth->user()['id'];
        $user = $this->Users->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('Profil modifie avec succes !!!'));

                return $this->redirect(['controller'=>'Front','action' => 'index']);
            }
            $this->Flash->error(__('Echec lors de la modification du profil !!!'));
        }

        $villes = $this->Users->Villes->find()->all();

        $this->set(compact('user','villes'));
    }

}

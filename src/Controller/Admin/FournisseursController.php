<?php
namespace App\Controller\Admin;

use App\Controller\AppController;
use Cake\Event\Event;

/**
 * Fournisseurs Controller
 *
 * @property \App\Model\Table\FournisseursTable $Fournisseurs
 */
class FournisseursController extends AppController
{



    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Secteurs','Villes','Groupes']
        ];
        $fournisseurs = $this->paginate($this->Fournisseurs);

        $this->set(compact('fournisseurs'));
        $this->set('_serialize', ['fournisseurs']);
    }

    /**
     * View method
     *
     * @param string|null $id Fournisseur id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $fournisseur = $this->Fournisseurs->get($id, [
            'contain' => ['Secteurs', 'Offres', 'Users','Villes','Orders','Listes.Listeitems', 'Categories']
        ]);

        $this->set('fournisseur', $fournisseur);
        $this->set('_serialize', ['fournisseur']);
    }





    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $fournisseur = $this->Fournisseurs->newEntity();
        if ($this->request->is('post')) {

            $fournisseur->code = $this->request->getData('code');
            $fournisseur->name = $this->request->getData('name');
            $fournisseur->adresse = $this->request->getData('adresse');
            $fournisseur->email = $this->request->getData('email');
            $fournisseur->telephone = $this->request->getData('phone');
            $fournisseur->mobile = $this->request->getData('mobile');
            $fournisseur->ville_id = $this->request->getData('ville_id');
            $fournisseur->groupe_id = $this->request->getData('groupe_id');

            $request = $this->request;

            $fournisseur = $this->Fournisseurs->save($fournisseur);
            if($fournisseur){
                $this->loadModel('Users');

                $user=$this->Users->NewEntity();
                $user->last_name = $request->getData('last_name') ? $request->getData('last_name'):'-';
                $user->first_name = $request->getData('first_name') ?$request->getData('first_name'):'-' ;
                $user ->name = $request->getData('last_name') . "  " .$request->getData('first_name');
                $user->phone=$request->getData('user_phone');
                $user->password=$request->getData('password');
                $user->email=$request->getData('user_email');
                $user->role_id=2;
                $user->created=date('Y-m-d');
                $user->active=1;
                    $this->Flash->success(__('Le fournisseur a ete cree.'));
                    if(!empty($request->getData()['photo']['name'])){
                        $file = $request->getData()['photo'];
                        $ext = substr(strtolower(strrchr($file['name'],'.')),1);
                        $arr_ext = array('jpg','png','jpeg','gif');
                        if(in_array($ext,$arr_ext)){
                            if(!file_exists(WWW_ROOT.'img'.DS.'fournisseurs')){
                                mkdir(WWW_ROOT.'img'.DS.'fournisseurs');
                            }

                            if(file_exists(WWW_ROOT.'img'.DS.'fournisseurs'.DS.$fournisseur->id.'.'.$ext)){
                                unlink(WWW_ROOT.'img'.DS.'fournisseurs'.DS.$fournisseur->id.'.'.$ext);
                            }

                            // $name = $file['name'].time();
                            $name = $fournisseur->id;

                            move_uploaded_file($file['tmp_name'], WWW_ROOT.'img'.DS.'fournisseurs'.DS.$name.'.'.$ext);

                            $fournisseur->imageUri = 'fournisseurs/'.$name.'.'.$ext;
                            $this->Fournisseurs->save($fournisseur);
                        }

                    }

                $user->fournisseur_id=$fournisseur->id;
                $user= $this->Users->save($user);
                if($user){
                    $this->Flash->success(__('L\'administrateur du compte de '.$fournisseur->name .'a ete cree'));
                    if(!empty($request->getData()['user_photo']['name'])){
                        $file = $request->getData()['user_photo'];
                        $ext = substr(strtolower(strrchr($file['name'],'.')),1);
                        $arr_ext = array('jpg','png','jpeg','gif');
                        if(in_array($ext,$arr_ext)){
                            if(!file_exists(WWW_ROOT.'img'.DS.'users')){
                                mkdir(WWW_ROOT.'img'.DS.'users');
                            }

                            if(file_exists(WWW_ROOT.'img'.DS.'users'.DS.$user->id.'.'.$ext)){
                                unlink(WWW_ROOT.'img'.DS.'users'.DS.$user->id.'.'.$ext);
                            }

                            // $name = $file['name'].time();
                            $name = $user->id;

                            move_uploaded_file($file['tmp_name'], WWW_ROOT.'img'.DS.'users'.DS.$name.'.'.$ext);

                            $user->imageUri = 'users/'.$name.'.'.$ext;
                            $this->Users->save($user);
                        }

                    }
                }

                return $this->redirect(['action' => 'index']);
                } else {
                $this->Flash->error(__('The fournisseur could not be saved. Please, try again.'));
            }
        }
        $secteurs = $this->Fournisseurs->Secteurs->find()->all();
        $villes = $this->Fournisseurs->Villes->find()->all();
        $groupes = $this->Fournisseurs->Groupes->find()->all();
        $this->set(compact('fournisseur', 'secteurs','villes','groupes'));
        $this->set('_serialize', ['fournisseur']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Fournisseur id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $fournisseur = $this->Fournisseurs->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $fournisseur->code = $this->request->getData('code');
            $fournisseur->name = $this->request->getData('name');
            $fournisseur->adresse = $this->request->getData('adresse');
            $fournisseur->email = $this->request->getData('email');
            $fournisseur->telephone = $this->request->getData('phone');
            $fournisseur->mobile = $this->request->getData('mobile');
            $fournisseur->ville_id = $this->request->getData('ville_id');
            $fournisseur->groupe_id = $this->request->getData('groupe_id');
            $fournisseur->id=$this->request->getData('id');

            $request = $this->request;
            $fournisseur = $this->Fournisseurs->save($fournisseur);
            if ($fournisseur) {
                $this->Flash->success(__('Enregistrement fait avec succes !!!.'));
                if(!empty($request->getData()['photo']['name'])){
                    $file = $request->getData()['photo'];
                    $ext = substr(strtolower(strrchr($file['name'],'.')),1);
                    $arr_ext = array('jpg','png','jpeg','gif');
                    if(in_array($ext,$arr_ext)){
                        if(!file_exists(WWW_ROOT.'img'.DS.'fournisseurs')){
                            mkdir(WWW_ROOT.'img'.DS.'fournisseurs');
                        }

                        if(file_exists(WWW_ROOT.'img'.DS.'fournisseurs'.DS.$fournisseur->id.'.'.$ext)){
                            unlink(WWW_ROOT.'img'.DS.'fournisseurs'.DS.$fournisseur->id.'.'.$ext);
                        }

                        // $name = $file['name'].time();
                        $name = $fournisseur->id;

                        move_uploaded_file($file['tmp_name'], WWW_ROOT.'img'.DS.'fournisseurs'.DS.$name.'.'.$ext);

                        $fournisseur->imageUri = 'fournisseurs/'.$name.'.'.$ext;
                        $this->Fournisseurs->save($fournisseur);
                    }

                }
                return $this->redirect(['action' => 'view',$fournisseur->id]);
            } else {
                $this->Flash->error(__('The fournisseur could not be saved. Please, try again.'));
            }
        }
        $villes = $this->Fournisseurs->Villes->find()->all();
        $groupes = $this->Fournisseurs->Groupes->find()->all();

        $this->set(compact('fournisseur', 'villes','groupes'));
        $this->set('_serialize', ['fournisseur']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Fournisseur id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $fournisseur = $this->Fournisseurs->get($id);
        if ($this->Fournisseurs->delete($fournisseur)) {
            $this->Flash->success(__('The fournisseur has been deleted.'));
        } else {
            $this->Flash->error(__('The fournisseur could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}

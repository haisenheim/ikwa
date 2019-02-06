<?php
namespace App\Controller\Admin;

use App\Controller\AppController;
use Cake\Event\Event;

/**
 * Secteurs Controller
 *
 * @property \App\Model\Table\SecteursTable $Secteurs
 */
class SecteursController extends AppController
{



    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $secteurs = $this->paginate($this->Secteurs);

        $this->set(compact('secteurs'));
        $this->set('_serialize', ['secteurs']);
    }

    /**
     * View method
     *
     * @param string|null $id Secteur id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $secteur = $this->Secteurs->get($id, [
            'contain' => ['Fournisseurs']
        ]);

        $this->set('secteur', $secteur);
        $this->set('_serialize', ['secteur']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $secteur = $this->Secteurs->newEntity();
        if ($this->request->is('post')) {
            $secteur = $this->Secteurs->patchEntity($secteur, $this->request->getData());
            $secteur=$this->Secteurs->save($secteur);
            if ($secteur) {
                if(!empty($this->request->getData('photo')['name'])){
                    $file = $this->request->getData('photo');
                    $ext = substr(strtolower(strrchr($file['name'],'.')),1);
                    $arr_ext = array('jpg','png','jpeg','gif');
                    if(in_array($ext,$arr_ext)){
                        if(!file_exists(WWW_ROOT.'img'.DS.'secteurs')){
                            mkdir(WWW_ROOT.'img'.DS.'secteurs');
                        }
                        if(file_exists(WWW_ROOT.'img'.DS.'secteurs'.DS.$secteur->id.'.'.$ext)){
                            unlink(WWW_ROOT.'img'.DS.'secteurs'.DS.$secteur->id.'.'.$ext);
                        }
                        $name = $secteur->id;

                        move_uploaded_file($file['tmp_name'], WWW_ROOT.'img'.DS.'secteurs'.DS.$name.'.'.$ext);

                        $secteur->imageUri = 'secteurs/'.$name.'.'.$ext;
                        $this->Secteurs->save($secteur);
                    }

                }
                $this->Flash->success(__('Secteur cree avec success!!!'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('La creation du secteur a echoue. Veuillez reessayer !!!'));
            }
        }
        $this->set(compact('secteur'));
        $this->set('_serialize', ['secteur']);
    }


    public function edit($id=null)
    {
        $secteur = $this->Secteurs->get($id);
        if ($this->request->is('post')) {
            $secteur = $this->Secteurs->patchEntity($secteur, $this->request->getData());
            $secteur=$this->Secteurs->save($secteur);
            if ($secteur) {
                if(!empty($this->request->getData('photo')['name'])){
                    $file = $this->request->getData('photo');
                    $ext = substr(strtolower(strrchr($file['name'],'.')),1);
                    $arr_ext = array('jpg','png','jpeg','gif');
                    if(in_array($ext,$arr_ext)){
                        if(!file_exists(WWW_ROOT.'img'.DS.'secteurs')){
                            mkdir(WWW_ROOT.'img'.DS.'secteurs');
                        }
                        if(file_exists(WWW_ROOT.'img'.DS.'secteurs'.DS.$secteur->id.'.'.$ext)){
                            unlink(WWW_ROOT.'img'.DS.'secteurs'.DS.$secteur->id.'.'.$ext);
                        }
                        $name = $secteur->id;

                        move_uploaded_file($file['tmp_name'], WWW_ROOT.'img'.DS.'secteurs'.DS.$name.'.'.$ext);

                        $secteur->imageUri = 'secteurs/'.$name.'.'.$ext;
                        $this->Secteurs->save($secteur);
                    }

                }
                $this->Flash->success(__('Secteur mis a jour avec success!!!'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('La mise a jour du secteur a echoue. Veuillez reessayer !!!'));
            }
        }
        $this->set(compact('secteur'));
        $this->set('_serialize', ['secteur']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Secteur id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit_old($id = null)
    {
        $secteur = $this->Secteurs->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $secteur = $this->Secteurs->patchEntity($secteur, $this->request->data);
            if ($this->Secteurs->save($secteur)) {
                $this->Flash->success(__('The secteur has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The secteur could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('secteur'));
        $this->set('_serialize', ['secteur']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Secteur id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $secteur = $this->Secteurs->get($id);
        if ($this->Secteurs->delete($secteur)) {
            $this->Flash->success(__('The secteur has been deleted.'));
        } else {
            $this->Flash->error(__('The secteur could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}

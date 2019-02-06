<?php
namespace App\Controller\Api;

use App\Controller\AppController;
use Cake\Event\Event;

/**
 * Fournisseurs Controller
 *
 * @property \App\Model\Table\FournisseursTable $Fournisseurs
 */
class FournisseursController extends AppController
{

    public function beforeFilter(Event $event){
        parent::beforeRender($event);
        $this->Auth->allow();
    }


    public function getAll()
    {


        $fournisseurs = $this->paginate($this->Fournisseurs->find()->contain(['Secteurs','Villes']));

        $this->RequestHandler->renderAs($this,'json');

        $this->set(compact('fournisseurs'));
        $this->set('_serialize', 'fournisseurs');
    }


    public function getAllSecteurs()
    {
        //debug($this->request); die();
        $four = $this->Fournisseurs->Secteurs->find()->all();
        $this->RequestHandler->renderAs($this,'json');
        $this->set(compact('four'));
        $this->set('_serialize', 'four');
    }



    public function getOffres()
    {
        $cat_id = $this->request->getQuery("id");

        $this->loadModel('Listes');

        $liste=$this->Listes->find()->where(['fournisseur_id'=>$cat_id,'actuel'=>1])->contain(['Listeitems.Offres.Categories'])->first();

        $produits=[];

        if($liste){
            foreach($liste->listeitems as $item){
                $produits[]=['id'=>$item->offre->id,'name'=>$item->offre->name,'photo'=>$item->offre->photo, 'prix_vente'=>$item->prix_vente_ikwa, 'prix_magasin'=>$item->prix_magasin,'prix_fournisseur'=>$item->prix_ikwa, 'reduction'=>$item->reduction,'categories'=>$item->offre->categories,'description'=>$item->offre->description];
            }
        }

       // $offres = $this->Fournisseurs->Offres->find()->where(['fournisseur_id'=>$cat_id])->contain(['Categories','Fournisseurs'])->all();

        //debug('I am here !!!'); die();

        $this->RequestHandler->renderAs($this,'json');

        $this->set(compact('produits'));
        $this->set('_serialize', 'produits');
    }

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Secteurs']
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
            'contain' => ['Secteurs', 'Offres', 'Users']
        ]);

        $this->set('fournisseur', $fournisseur);
        $this->set('_serialize', ['fournisseur']);
    }


    public function show($id = null)
    {
        $fournisseur = $this->Fournisseurs->get($id, [
            'contain' => ['Secteurs', 'Offres.Fournisseurs','Offres.Categories']
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
            $fournisseur = $this->Fournisseurs->patchEntity($fournisseur, $this->request->data);
            if ($this->Fournisseurs->save($fournisseur)) {
                $this->Flash->success(__('The fournisseur has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The fournisseur could not be saved. Please, try again.'));
            }
        }
        $secteurs = $this->Fournisseurs->Secteurs->find('list', ['limit' => 200]);
        $this->set(compact('fournisseur', 'secteurs'));
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
            $fournisseur = $this->Fournisseurs->patchEntity($fournisseur, $this->request->data);
            if ($this->Fournisseurs->save($fournisseur)) {
                $this->Flash->success(__('The fournisseur has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The fournisseur could not be saved. Please, try again.'));
            }
        }
        $secteurs = $this->Fournisseurs->Secteurs->find('list', ['limit' => 200]);
        $this->set(compact('fournisseur', 'secteurs'));
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

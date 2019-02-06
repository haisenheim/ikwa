<?php
namespace App\Controller\Frn;

use App\Controller\AppController;

/**
 * Listes Controller
 *
 * @property \App\Model\Table\ListesTable $Listes
 */
class ListesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'Order' => ['Listes.created DESC']
        ];
        $listes = $this->paginate($this->Listes->find()->where(['fournisseur_id'=>$this->Auth->user()['fournisseur_id']]));

        $this->set(compact('listes'));
        $this->set('_serialize', ['listes']);
    }

    /**
     * View method
     *
     * @param string|null $id Liste id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $liste = $this->Listes->get($id, [
            'contain' => ['Listeitems.Offres','Listeitems.Listes.Grilles.Grilleitems']
        ]);

        $this->set('liste', $liste);
        $this->set('_serialize', ['liste']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function create()
    {
        $liste = $this->Listes->newEntity();
        if ($this->request->is('post')) {
            $liste = $this->Listes->patchEntity($liste, $this->request->data);
            if ($this->Listes->save($liste)) {
                $this->Flash->success(__('The liste has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The liste could not be saved. Please, try again.'));
            }
        }
        $this->loadModel('Offres');
        $offres = $this->Offres->find()->where(['fournisseur_id'=>$this->Auth->user()['fournisseur_id']])->all();
        $this->set(compact('liste', 'offres'));
        $this->set('_serialize', ['liste']);
    }



    public function add()
    {
        $liste = $this->Listes->newEntity();
        if ($this->request->is('post')) {
            $liste = $this->Listes->patchEntity($liste, $this->request->data);
            if ($this->Listes->save($liste)) {
                $this->Flash->success(__('The liste has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The liste could not be saved. Please, try again.'));
            }
        }
        $this->loadModel('Offres');
        $offres = $this->Offres->find()->where(['fournisseur_id'=>$this->Auth->user()['fournisseur_id']])->all();
        $this->set(compact('liste', 'offres'));
        $this->set('_serialize', ['liste']);
    }








    public function saveJson(){
        if($this->request->is('ajax')){

        }
    }

    public function createJson(){
        if($this->request->is('ajax')){
            $offres = $this->request->getData('offres');
            $date_limite = $this->request->getData('date_limite');
            $liste = $this->Listes->newEntity();
            $liste->name=date('dmyHm').$this->Auth->user()['fournisseur_id'];
            $liste->date_peremption=$date_limite;
            $liste->active = 1;
            $liste->fournisseur_id=$this->Auth->user()['fournisseur_id'];
            $this->loadModel('Grilles');
            $grille = $this->Grilles->find()->where(['actuel'=>1])->contain(['Grilleitems'])->first();
            $liste->grille_id=$grille->id;
            $liste=$this->Listes->save($liste);
            if($liste){
                foreach($offres as $offre){
                    $item = $this->Listes->Listeitems->newEntity();
                    $item->offre_id = $offre['id'];
                    $item->liste_id=$liste->id;
                    $item->prix_magasin=$offre['pm'];
                    $item->prix_ikwa=$offre['pp'];

                    $t=0;
                    if($offre['pm']){
                        $t= 100 * ($offre['pm'] - $offre['pp'])/$offre['pm'];
                    }else{
                        $t=0;
                    }
                    $prix=0;
                    foreach($grille->grilleitems as $it){

                        if(($t >= $it->min) && ($t <= $it->max)){
                            $prix = $offre['pp'] + $offre['pp']* $it->coef/100;
                        }
                    }

                    $item->reduction = ($offre['pm'] - $prix)/100;

                    $item->prix_vente_ikwa = $prix;
                    $item->date_limite=$liste->date_peremption;
                    $item=$this->Listes->Listeitems->save($item);
                }
                $id=$liste->id;
            }


            $this->set(compact('id'));
            $this->set('_serialize',true);
        }
    }




    public function disable($id){
        $liste =$this->Listes->get($id);
        $liste->active = 0;
        $dossier=$this->Listes->save($liste);

        if($dossier){
            $this->Flash->success('Liste desactivee avec succes !!!!');
        }

        return $this->redirect($this->referer());
    }

    public function enable($id){
        $liste =$this->Listes->get($id);
        $liste->active = 1;
        $dossier=$this->Listes->save($liste);

        if($dossier){
            $this->Flash->success('Liste activee avec succes !!!!');
        }

        return $this->redirect($this->referer());
    }

    public function current($id){
        $this->Listes->updateAll(['actuel'=>0],[true]);
        $liste =$this->Listes->get($id);
        $liste->actuel = 1;
        $this->loadModel('Grilles');
        $grille = $this->Grilles->find()->where(['actuel'=>1])->first();
        $liste->grille_id=$grille->id;
        $dossier=$this->Listes->save($liste);

        if($dossier){

            $this->Flash->success('Liste activee avec succes !!!!');
        }

        return $this->redirect($this->referer());
    }





    /**
     * Edit method
     *
     * @param string|null $id Liste id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $liste = $this->Listes->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $liste = $this->Listes->patchEntity($liste, $this->request->data);
            if ($this->Listes->save($liste)) {
                $this->Flash->success(__('The liste has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The liste could not be saved. Please, try again.'));
            }
        }
        $fournisseurs = $this->Listes->Fournisseurs->find('list', ['limit' => 200]);
        $this->set(compact('liste', 'fournisseurs'));
        $this->set('_serialize', ['liste']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Liste id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $liste = $this->Listes->get($id);
        if ($this->Listes->delete($liste)) {
            $this->Flash->success(__('The liste has been deleted.'));
        } else {
            $this->Flash->error(__('The liste could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}

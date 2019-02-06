<?php
namespace App\Controller\Admin;

use App\Controller\AppController;

class OffresController extends AppController
{


    public function index()
    {
        $this->paginate = [

            'order' => [
                'Offres.name' => 'ASC',
            ],
            'limit' => 25
        ];

        $offres = $this->paginate($this->Offres->find()->where(['fournisseur_id'=>$this->Auth->user()['fournisseur_id']]));

        $this->set(compact('offres'));
        $this->set('_serialize', ['offres']);
    }



////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

public function enable($id){

    $offre = $this->Offres->get($id);

    if($offre->fournisseur_id==$this->Auth->user()['fournisseur_id']){
        $offre->statut =1;
        $offre= $this->Offres->save($offre);
        $this->Flash->success('Cette offre est desormais disponible en ligne');
    }else{
        $this->Flash->error('Vous n\'avez pas les priviliges pour modifier cette offre');
    }

    return $this->redirect($this->referer());
}

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    public function disable($id){

        $offre = $this->Offres->get($id);

        if($offre->fournisseur_id==$this->Auth->user()['fournisseur_id']){
            $offre->statut =0;
            $offre= $this->Offres->save($offre);
            $this->Flash->success('Cette offre est desormais indisponible en ligne');
        }else{
            $this->Flash->error('Vous n\'avez pas les priviliges pour modifier cette offre');
        }

        return $this->redirect($this->referer());
    }


/////////////////////////////////////////////////////////////////////////////////////////////////////////////////



    public function view($id)
    {

        $offre = $this->Offres->find('all', [
            'contain' => ['Categories','Fournisseurs'],
            'conditions' => [
                'Offres.id' => $id,
            ]
        ])->first();
        if(empty($offre)) {
            return $this->redirect(['action' => 'index']);

        }
        $this->set(compact('offre'));
        $this->set('_serialize', ['offre']);
    }

////////////////////////////////////////////////////////////////////////////////

    public function addcart()
    {
        if ($this->request->is('post')) {

            $id = $this->request->data['id'];
            $quantity = 1;
            //$productoptionId = isset($this->request->data['productoptionlist']) ? $this->request->data['productoptionlist'] : 0;

            $product = $this->Offres->get($id, [
                'contain' => []
            ]);
            if(empty($product)) {
                $this->Flash->error('Requete invalide');
            } else {
                $this->Cart->add($id, $quantity);
                $this->Flash->success($product->name . ' a ete ajoute au panier d\'achat !!!');
            }

            return $this->redirect($this->referer());
        } else {
            return $this->redirect(['controller'=>'front','action' => 'index']);
        }
    }

////////////////////////////////////////////////////////////////////////////////


}

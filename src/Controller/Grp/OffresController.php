<?php
namespace App\Controller\Grp;

use App\Controller\AppController;

class OffresController extends AppController
{

////////////////////////////////////////////////////////////////////////////////

    public function initialize()
    {
        parent::initialize();
        $this->loadComponent('Cart');
    }

////////////////////////////////////////////////////////////////////////////////

    public function sitemap()
    {
        $products = $this->Products->find('all', [
            'order' => [
                'Products.name' => 'ASC'
            ],
            'fields' => [
                'Products.slug'
            ],
            'conditions' => [
                'Products.active' => 1,
            ]
        ]);
        $this->set(compact('products'));

        $this->response->type('xml');
        $this->viewBuilder()->layout(false);
    }

//////////////////////////////////////////////////////////////

    public function index()
    {
        $this->paginate = [

            'order' => [
                'Offres.name' => 'ASC',
            ],

            'limit' => 12
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

public function add(){

    $offre = $this->Offres->newEntity();

    if($this->request->is('post')){

        debug($this->request->getData()); die();

        $offre=$this->Offres->patchEntity($offre, $this->request->data);
        $offre->fournisseur_id= $this->Auth->user()['fournisseur_id'];
        $offre->statut=1;
        $offre->user_id = $this->Auth->user()['id'];

        $offre = $this->Offres->save($offre);
        if ($this->Offres->save($offre)) {
            $this->Flash->success(__('Une nouvelle offre a ete faite sur IKWA.'));
            if(!empty($this->request->data['photo']['name'])){
                $file = $this->request->data['photo'];
                $ext = substr(strtolower(strrchr($file['name'],'.')),1);
                $arr_ext = array('jpg','png','jpeg','gif');
                if(in_array($ext,$arr_ext)){
                    if(!file_exists(WWW_ROOT.'img'.DS.'offres')){
                        mkdir(WWW_ROOT.'img'.DS.'offres');
                    }
                    if(file_exists(WWW_ROOT.'img'.DS.'offres'.DS.$offre->id.'.'.$ext)){
                        unlink(WWW_ROOT.'img'.DS.'offres'.DS.$offre->id.'.'.$ext);
                    }
                    $name = $offre->id;

                    move_uploaded_file($file['tmp_name'], WWW_ROOT.'img'.DS.'offres'.DS.$name.'.'.$ext);

                    $offre->photo = 'offres/'.$name.'.'.$ext;
                    $this->Offres->save($offre);
                }

            }
            return $this->redirect(['action' => 'index']);
        }
        else {
            $this->Flash->error(__('The offre could not be saved. Please, try again.'));
        }

    }

    $categories = $this->Offres->Categories->find()->where(['Categories.fournisseur_id'=>$this->Auth->user()['fournisseur_id']])->all();
   $this->set(compact('categories'));
    $this->set(compact('offre'));
}





////////////////////////////////////////////////////////////////////////////////

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

    public function remove($id = null) {
        $product = $this->Cart->remove($id);
        if(!empty($product)) {
            // $this->Flash->error($product['name'] . ' was removed from your shopping cart');
        }
        return $this->redirect(['action' => 'cart']);
    }

////////////////////////////////////////////////////////////////////////////////



////////////////////////////////////////////////////////////////////////////////

    public function itemupdate() {
        if ($this->request->is('ajax')) {
            $id = $this->request->data['id'];
            $quantity = isset($this->request->data['quantity']) ? $this->request->data['quantity'] : 1;
            if(isset($this->request->data['mods']) && ($this->request->data['mods'] > 0)) {
                $productmodId = $this->request->data['mods'];
            } else {
                $productmodId = 0;
            }
            $product = $this->Cart->add($id, $quantity, $productmodId);
        }
        $cart = $this->Cart->getcart();
        echo json_encode($cart);
        die;
    }

////////////////////////////////////////////////////////////////////////////////

    public function clear()
    {
        $this->Cart->clear();
        $this->Flash->success('Le panier a ete vide !!!');
        return $this->redirect(['contrller'=>'front','action' => 'index']);
    }

////////////////////////////////////////////////////////////////////////////////

}

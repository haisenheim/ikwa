<?php
namespace App\Controller\Api;

use App\Controller\AppController;
use Cake\Event\Event;

class OffresController extends AppController
{

////////////////////////////////////////////////////////////////////////////////

    public function initialize()
    {
        parent::initialize();
        $this->loadComponent('Cart');
    }

    public function beforeFilter(Event $event){
        parent::beforeRender($event);
        $this->Auth->allow();
    }



//////////////////////////////////////////////////////////////

    public function index()
    {
        $this->paginate = [
            'contain' => ['Categories','Secteurs','Fournisseurs'],
            'order' => [
                'Offres.name' => 'ASC',
            ],

            'limit' => 12
        ];


        $offres = $this->paginate($this->Offres);

        $this->set(compact('offres'));
        $this->set('_serialize', ['offres']);
    }




    public function indexByFournisseur($id){
        $this->paginate = [
            'contain' => ['Categories'],
            'where'=>['fournisseur_id'=>$id],
            'order' => [
                'Offres.name' => 'ASC',
            ],
        ];


        $offres = $this->paginate($this->Offres);
        foreach($offres as $offre){
            $offre->categorie=$offre->category?$offre->category->name:"";
        }
        $this->RequestHandler->renderAs($this,'json');

        $this->set(compact('offres'));
        $this->set('_serialize', 'offres');
    }


    public function search(){

        $tags = $this->request->input('json_decode');


        $terms =[];
        $terms = explode(" ",trim($tags));

        $offres = [];

        foreach($terms as $term){
            $offre = $this->Offres->find()->where(['name like'=>$term])->first();
            $offres[]=$offre;
        }

        $this->RequestHandler->renderAs($this,'json');

        $this->set(compact('offres'));
        $this->set('_serialize', 'offres');

    }

    public function indexByCategorie($id){
        $this->paginate = [
            'contain' => ['Fournisseurs'],
            'where'=> ['category_id'=>$id],
            'order' => [
                'Offres.name' => 'ASC',
            ],
        ];


        $offres = $this->paginate($this->Offres);
        foreach($offres as $offre){
            $offre->fournisseur=$offre->fournisseur?$offre->fournisseur->name:"";

        }
        $this->RequestHandler->renderAs($this,'json');

        $this->set(compact('offres'));
        $this->set('_serialize', 'offres');
    }


    public function offresByCategory(){

        if ($this->request->is('post')) {

            $data = $this->request->input('json_decode');
            $data=(Array)$data;
            if(empty($data)){
                $data=$this->request->data;
            }

            if (!empty($data)){
                $offres = $this->Offres->find()->where(['category_id'=>$data["id"]])->all();
            }
        }

        $this->RequestHandler->renderAs($this,'json');
        $this->set(compact('offres'));
        $this->set('_serialize', 'offres');

    }


    public function getAll()
    {
        $this->paginate = [
            'contain' => ['Categories','Fournisseurs'],
            'order' => [
                'Offres.name' => 'ASC',
            ],
        ];


        $offres = $this->paginate($this->Offres);

        $this->RequestHandler->renderAs($this,'json');

        $this->set(compact('offres'));
        $this->set('_serialize', 'offres');
    }

    public function getSuggestions()
    {
        $this->paginate = [
            'contain' => ['Fournisseurs.Villes'],
            'order' => [
                'Offres.name' => 'ASC',
            ],
            'limit'=>12
        ];

        $offres = $this->paginate($this->Offres);

        $this->RequestHandler->renderAs($this,'json');

        $this->set(compact('offres'));
        $this->set('_serialize', 'offres');
    }



    public function cart()
    {
        $shop = $this->Cart->getcart();
        $this->set(compact('shop'));
    }

////////////////////////////////////////////////////////////////////////////////

    public function cartupdate() {
        if ($this->request->is('post')) {

            //debug($this->request->data); die();
            foreach($this->request->data as $key => $value) {
                $a = explode('-', $key);
                $b = explode('_', $a[1]);
                $this->Cart->add($b[0], $value, $b[1]);
                $this->Cart->cart();
            }
        }
        return $this->redirect(['action' => 'cart']);
    }


    ///////////////////////////////////////////

    public function commander($id=null){

        $offre=$this->Offres->get($id);
        $offre->commande=true;
        $this->set(compact('offre'));
        $this->set('_serialize', ['offre']);
    }





////////////////////////////////////////////////////////////////////////////////

    public function view($slug = null)
    {

        $offre = $this->Offres->find('all', [
            'contain' => ['Categories','Secteurs','Fournisseurs'],
            'conditions' => [
                'Offres.id' => $slug,
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

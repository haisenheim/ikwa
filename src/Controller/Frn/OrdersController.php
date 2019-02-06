<?php
namespace App\Controller\Frn;

use App\Controller\AppController;
use Cake\Mailer\Email;


class OrdersController extends AppController
{

////////////////////////////////////////////////////////////////////////////////

    public function initialize()
    {
        parent::initialize();
        $this->loadComponent('Cart');
    }

////////////////////////////////////////////////////////////////////////////////

    public function view($id){

        $order = $this->Orders->get($id,
            [
                'contain'=>['Ordersitems.Offres','Users']
            ]);
        $this->set(compact('order'));

    }

 //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    public function index(){

        $debut = $this->request->getData('debut');
        $fin = $this->request->getData('fin');

        $this->paginate=[
            'limit'=>10000,
            'contain'=>['Users','Ordersitems.Offres'],
            'order' => ['Orders.created DESC']
        ];

        if(!empty($debut) && !empty($fin)){
            $fin = date_add(new \DateTime($fin), date_interval_create_from_date_string("1 day"));
            $orders = $this->paginate($this->Orders->find()->where(['Orders.created >= '=> $debut, 'Orders.created <='=>$fin,'Orders.fournisseur_id'=>$this->Auth->user()['fournisseur_id']]));
          // debug(new \DateTime($debut)); die();
        }else{
            $orders = $this->paginate($this->Orders->find()->where(['Orders.fournisseur_id'=>$this->Auth->user()['fournisseur_id']]));
        }

        $this->set(compact('orders'));
    }




////////////////////////////////////////////////////////////////////////////////

}

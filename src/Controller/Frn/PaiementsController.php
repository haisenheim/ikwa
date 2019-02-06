<?php
namespace App\Controller\Frn;

use App\Controller\AppController;

/**
 * Paiements Controller
 *
 * @property \App\Model\Table\PaiementsTable $Paiements
 *
 * @method \App\Model\Entity\Paiement[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PaiementsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Orders.Users', 'Users'],
            'limit' =>10000,
            'order'=>['Paiements.created'=>'DESC']
        ];
        $paiements = $this->paginate($this->Paiements->find()->where(['Paiements.fournisseur_id'=>$this->Auth->user()['fournisseur_id']]));


        $this->set(compact('paiements'));
    }

    /**
     * View method
     *
     * @param string|null $id Paiement id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $paiement = $this->Paiements->get($id, [
            'contain' => ['Orders', 'Users']
        ]);

        $this->set('paiement', $paiement);
    }

}

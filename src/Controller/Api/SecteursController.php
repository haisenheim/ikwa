<?php
namespace App\Controller\Api;

use App\Controller\AppController;
use Cake\Event\Event;


/**
 * Segments Controller
 *
 * @property \App\Model\Table\SecteursTable $Secteurs
 */
class SecteursController extends AppController
{



    public function beforeFilter(Event $event){
        parent::beforeRender($event);
        $this->Auth->allow();
    }



    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $secteurs = $this->Secteurs->find()->all();

        $this->RequestHandler->renderAs($this,'json');
        $this->set(compact('secteurs'));
        $this->set('_serialize', 'secteurs');
    }


    public function getAll()
    {
        $this->loadModel('Secteurs');
        $secteurs = $this->paginate($this->Secteurs);

        $this->RequestHandler->renderAs($this,'json');
        $this->set(compact('secteurs'));
        $this->set('_serialize', 'secteurs');
    }


    public function fournisseurs()
    {
        $id=$this->request->getQuery('id');
        $segments = $this->Secteurs->get($id,['contain'=>['Fournisseurs']]);
        $fournisseurs = $segments->fournisseurs;

        $this->RequestHandler->renderAs($this,'json');
        $this->set(compact('fournisseurs'));
        $this->set('_serialize', 'fournisseurs');
    }

}

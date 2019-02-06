<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link      https://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   https://opensource.org/licenses/mit-license.php MIT License
 */
namespace App\Controller;

use Cake\Controller\Controller;
use Cake\Event\Event;

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @link https://book.cakephp.org/3.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller
{

    /**
     * Initialization hook method.
     *
     * Use this method to add common initialization code like loading components.
     *
     * e.g. `$this->loadComponent('Security');`
     *
     * @return void
     */
    public function initialize()
    {
        parent::initialize();

        $this->loadComponent('RequestHandler');
        $this->loadComponent('Flash');

        $this->loadComponent('Auth',[
            'loginAction' => [
                'controller' => 'Users',
                'action' => 'login',
                'prefix' => false,
            ],
            'loginRedirect' => [
                'controller' => 'Front',
                'action' => 'index'
            ],
            'logoutRedirect' => [
                'controller' => 'Users',
                'action' => 'login'
            ],
            'authError' => 'Oups!!! Veuillez vous identifier pour acceder à cette zone.',
            'authenticate' => [
                'Form' => [
                    'fields' => ['username' => 'email'],
                    'scope' => ['Users.active' => 1],
                ]
            ],
            'authorize' => ['Controller'],
            'unauthorizedRedirect'=>$this->referer()

        ]);

        /*
         * Enable the following component for recommended CakePHP security settings.
         * see https://book.cakephp.org/3.0/en/controllers/components/security.html
         */
        //$this->loadComponent('Security');
    }

    public function isAuthorized(){
        $action = $this->request->getParam('action');
        $controller = $this->request->getParam('controller');
        $user = $this->Auth->user();
        $headers=explode(',',$this->request->getHeaders()['Accept'][0]);
        //debug($this->Auth); die();
        if(in_array('application/json',$headers)){
            return true;
        };

        //debug($this->request->getServerParams()); die();

        if($controller=="Users"&&$action=="login"){
            return true;
        }
        if($this->Auth->user()['role_id']==1){

            return true;
        }

        if($user['role_id']==2){

           // debug($this->request->get); die();

           if(in_array($controller,['Front','Orders','Users','Listes','Categories','Offres'])){

               return true;
           }

        }

        if($user['role_id']==3){

            if(in_array($controller,['Fournisseurs','Front','Users','Orders','Villes','Listes'])){
                return true;
            }

        }

        if($user['role_id']==4){

            if(in_array($controller,['Front','Users'])){
                return true;
            }

        }


        return false;
    }



    public function beforeRender(Event $event)
    {
       // debug($this->Auth); die();
        if (!array_key_exists('_serialize', $this->viewVars) &&
            in_array($this->response->getType(), ['application/json', 'application/xml'])
        ) {
            $this->set('_serialize', true);
        }


        if(!array_key_exists('_serialize',$this->viewVars)) {
            {
                if ($this->Auth->user()['role_id'] == 1) {
                    $this->Auth->allow();
                    $this->viewBuilder()->setLayout('admin');
                    $this->set(['usr' => $this->Auth->user()]);
                }

                if ($this->Auth->user()['role_id'] == 2) {
                    $this->Auth->allow();
                    $this->viewBuilder()->setLayout('fournisseurs');
                    $this->loadModel('Fournisseurs');
                    $this->set('frn', $this->Fournisseurs->get($this->Auth->user()['fournisseur_id']));
                    $this->set(['usr' => $this->Auth->user()]);
                }

                if ($this->Auth->user()['role_id'] == 3) {
                    $this->Auth->allow();
                    $this->viewBuilder()->setLayout('grp');
                    $this->loadModel('Groupes');
                    $this->set('grp', $this->Groupes->get($this->Auth->user()['groupe_id']));
                    $this->set(['usr' => $this->Auth->user()]);
                }

                if ($this->Auth->user()['role_id'] == 4) {
                    $this->Auth->allow();
                    $this->viewBuilder()->setLayout('caissier');
                    $this->loadModel('Fournisseurs');
                    $this->set('frn', $this->Fournisseurs->get($this->Auth->user()['fournisseur_id']));
                    $this->set(['usr' => $this->Auth->user()]);
                }

            }
        }




        $token = $this->request->getParam('_csrfToken');
        $this->set(compact('token'));
    }


    /*public function beforeFilter(Event $event){
        debug($this->request); die();
    }*/
}

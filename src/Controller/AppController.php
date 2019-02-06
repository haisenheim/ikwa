<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link      http://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   http://www.opensource.org/licenses/mit-license.php MIT License
 */
namespace App\Controller;

use Cake\Controller\Controller;
use Cake\Event\Event;
use Cake\I18n\Time;

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @link http://book.cakephp.org/3.0/en/controllers.html#the-app-controller
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
        $this->loadComponent('Cookie');
        $this->loadComponent('Flash');
        $this->loadComponent('Paginator');

        $this->loadComponent('Auth', [
            'loginAction' => [
                'controller' => 'Users',
                'action' => 'login',
                'prefix' => false,
            ],
            'authError' => 'Acces non autorise',
            'unauthorizedRedirect' => [
                'controller' => 'Users',
                'action' => 'login',
                'prefix'=>false
            ],
            'authenticate' => [
                'Form' => [
                    'fields' => ['username' => 'email'],
                    'scope' => ['Users.active' => 1],
                ]
            ],
            'authorize' => ['Controller']
        ]);

        $this->Auth->allow(['display']);
    }



    public function beforeRender(Event $event)
    {
        if (!array_key_exists('_serialize', $this->viewVars) &&
            in_array($this->response->getType(), ['application/json', 'application/xml'])
        ) {
            $this->set('_serialize', true);
        }
        $this->Auth->allow(['index','view']);
        $this->Auth->allow(['view','index']);

        if($this->request->getParam('controller')=='Front'){
            $this->viewBuilder()->setLayout('front');
        }


        if($this->Auth->user()['role_id']==1){
            $this->viewBuilder()->setLayout('super');
            $this->set(['usr'=>$this->Auth->user()]);
            $this->loadModel('Fournisseurs');
            $frns = $this->Fournisseurs->find()->all();
            $this->set(compact('frns'));
        }

        if($this->Auth->user()['role_id']==2){
            $this->loadModel('Fournisseurs');
            $this->viewBuilder()->setLayout('frn');
            $this->set(['frn'=>$this->Fournisseurs->get($this->Auth->user()['fournisseur_id'])]);
            $this->loadModel('Categories');
            $ctgs = $this->Categories->find()->where(['fournisseur_id'=>$this->Auth->user()['fournisseur_id']]);
            $this->set(compact('ctgs'));

        }

        if($this->Auth->user()['role_id']==3){
            $this->loadModel('Groupes');
            $this->viewBuilder()->setLayout('grp');
            $this->set(['grp'=>$this->Groupes->get($this->Auth->user()['groupe_id'])]);
        }

        if($this->Auth->user()['role_id']==4){
            $this->loadModel('Fournisseurs');
            $this->viewBuilder()->setLayout('caissier');
            $this->set(['frn'=>$this->Fournisseurs->get($this->Auth->user()['fournisseur_id'])]);
        }

        $token = $this->request->getParam('_csrfToken');
        $this->set(compact('token'));
        $this->set(['usr'=>$this->Auth->user()]);
    }



    // public function protocol($protocol = 'http') {
    //     return $this->redirect($protocol . '://' . $_SERVER['SERVER_NAME'] . $this->request->here, 301);
    // }

////////////////////////////////////////////////////////////////////////////////

    public function isAuthorized()
    {
        $action = $this->request->getParam('action');
        $controller = $this->request->getParam('controller');
        $user = $this->Auth->user();
        $headers=explode(',',$this->request->getHeaders()['Accept'][0]);
        if(in_array('application/json',$headers)){
            return true;
        };

        //debug( $user = $this->Auth->user()); die();

        if($this->Auth->user()['role_id']==1){
            return true;
        }

        if($user['role_id']==2){
            if(in_array($controller,['Front','Offres','Users','Categories','Listes','Orders',"Paiements"])){
                return true;
            }
        }

        if($user['role_id']==3){
            if(in_array($controller,['Front','Fournisseurs','Users','Categories','Listes','Orders','Villes'])){
                return true;
            }
        }

        if($user['role_id']==4){
            if(in_array($controller,['Front','Users','Orders'])){
                return true;
            }
        }

        return false;
    }






}

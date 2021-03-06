<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {
  // public $components = array('DebugKit.Toolbar');
  // public $components = array('Auth', 'Session');
  // public $components = array('Session' => array(),
  //   'Auth' => array(
  //     'loginAction' => array(
  //       // ログイン処理用のアクション設定
  //       'controller' => 'users',
  //       'action' => 'login'
  //     ),
  //     'authenticate' => array(
  //       // Formを使った認証を行う設定
  //       'Form' => array(
  //         // Userモデルを使用する
  //         'userModel' => 'User',
  //         // 絞り込み条件
  //         'scope' => array('User.id >' => '0'),
  //         // カラム指定
  //         'fields' => array(
  //           'username' => 'username',
  //           'password' => 'password',
  //         )
  //       )
  //     )
  //   )
// );

}

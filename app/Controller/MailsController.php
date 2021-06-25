<?php 

App::uses('CakeEmail', 'Network/Email');

class MailsController extends AppController {

  // public function index() {
  //   $email = new CakeEmail();

  //   $email->transport('Mail');

  //   $email->from('o.76.hamada.kazuki@gmail.com');
  //   $email->to('o.76.hamada.kazuki@gmail.com');

  //   $email->subject('これはテストメールです');
  //   $messages = $email->send('これはテストメールの本文です');

  //   $this->set('messages', $messages);
  // }

  public function index(){

    if($this->request->is('post')) {
      $data = array(
        'address' => $this->request->data['address']
      );
      $id = $this->Mail->save($data);


    }
    if($this->request->is('post')) {
      if(isset($this->request->data['Mail']['address'])) {
          $email = new CakeEmail('smtp');//この引数はemail.phpの変数を入れます。今回はsmtpを使用します。
          $email->to($this->request->data['Mail']['address']) //フォームに入力したメールアドレス
                ->subject('title')
                ->send('mailbody');
      }
    }
  }

  public function create() {
    if($this->request->is('post')) {
      $data = array(
        'address' => $this->request->data['Mail']['address'],
      );
      // $this->log($this->request->data, "LOG_OUT");

      $id = $this->Mail->save($data);

      if($id === false) {
        $this->render('create');
        return;
      }
    }

    if(isset($this->request->data['Mail']['address'])) {
      $email = new CakeEmail('smtp');//この引数はemail.phpの変数を入れます。今回はsmtpを使用します。
      $email->to($this->request->data['Mail']['address']) //フォームに入力したメールアドレス
            ->subject('できたよ〜')
            ->send('やったぜ');
      $this->Session->setFlash('メールを送信しました');
      $this->redirect('/Tasks/index');
    }
  }

  // public function index($receiver = null, $name = null, $pass = null) {
  //   $confirmation_link = "http://" . $_SERVER['HTTP_HOST'] . $this->webroot . "users/login/";
  //   $message = 'Hi,' . $name . ', Your Password is: ' . $pass;
  //   App::uses('CakeEmail', 'Network/Email');
  //   $email = new CakeEmail('gmail');
  //   $email->from('o.76.hamada.kazuki@gmail.com');
  //   $email->to('o.76.hamada.kazuki@gmail.com');
  //   $email->subject('Mail Confirmation');
  //   $email->send($message . " " . $confirmation_link);
  // }

}
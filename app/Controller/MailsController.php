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

    $mails = $this->request->data;
      // $email = new CakeEmail('smtp');//この引数はemail.phpの変数を入れます。今回はsmtpを使用します。
      $email = new CakeEmail('smtp');
      $email->from('test@test.com');
      $email->to('mail@test.com');
      $email->subject('sub');
      $email->template('thanks', 'sample_layout');
      $email->emailFormat('html');
      $email->viewVars(array('user' => '鈴木'));

      $messages = $email->send();
      $this->set('messages', $messages);
    // if($this->request->is('post')) {
    //   if(isset($this->request->data['Mail']['address'])) {
    //       $email = new CakeEmail('smtp');//この引数はemail.phpの変数を入れます。今回はsmtpを使用します。
    //       $email->to($this->request->data['Mail']['address']) //フォームに入力したメールアドレス
    //             ->subject('title')
    //             ->send('mailbody');
    //   }
    // }
  }

  public function create() {
    if($this->request->is('post')) {
      $data = array(
        'address' => $this->request->data['Mail']['address'],
        'subject' => $this->request->data['Mail']['subject'],
        'message' => $this->request->data['Mail']['message'],
        'file' => $this->request->data['Mail']['file']['name'],
      );
      // $this->log($this->request->data, "LOG_OUT");

      $id = $this->Mail->save($data);

      if($id === false) {
        $this->render('create');
        return;
      }
    }

    if(isset($this->request->data['Mail']['address'])) {
      $mails = $this->request->data;
      $email = new CakeEmail('smtp');//この引数はemail.phpの変数を入れます。今回はsmtpを使用します。
      $email->to($mails['Mail']['address']) //フォームに入力したメールアドレス
            // ->attachments(array('test.png' => APP .'webroot/img/cake.icon.png'))
            ->attachments([$mails['Mail']['file']['name'] => $mails['Mail']['file']['tmp_name'],])
            ->subject($mails['Mail']['subject'])
            ->send($mails['Mail']['message']);
      $this->Session->setFlash('メールを送信しました');
      $this->redirect('/Tasks/index');
    }
    // $this->log($this->request->data, "LOG_OUT");
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
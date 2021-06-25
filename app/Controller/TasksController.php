<?php 
class TasksController extends AppController {
  // 動作確認のため
  public $scaffold;
  public $components = array('Test');
  public $helpers = array('Test');
  public $paginate = array(
      'limit' => 3,
      'order' => array(
        'Task.created' => 'DESC',
      ),
      'conditions' => array(
        'Task.id <' => 300
      )
  );



  public function index() {

    $message = $this->Test->hello();
    $this->Session->setFlash($message);
    $this->Task->sayHello();

    // データをモデルから取得してビューへ渡す
    $options = array(
      'conditions' => array(
        'Task.status' => 0
      )
    );
    $tasks_data = $this->Task->find('all', $options);
    $this->set('tasks_data', $tasks_data);

    // ページネーションを使用する場合はこちらをビューへセットする
    $page = $this->paginate('Task', array(
      'Task.id not' => null
    ));
    $this->set('page', $page);

    // app/View/Tasks/index.ctpを表示
    $this->render('index');

  } 

  public function done() {
    // URLの末尾からタスクIDを取得してデータを更新
    $id = $this->request->pass[0];
    $this->Task->id = $id;
    $this->Task->saveField('status',1);
    $msg = sprintf('タスク %sを完了しました。',$id);

    // メッセージを表示してリダイレクト
    $this->Session->setFlash($msg);
    $this->redirect('/Tasks/index');
  }

  public function create() {

    // POSTされた場合だけ処理を行う
    if ($this->request->is('post')) {
      $data = array(
        'name' => $this->request->data['name'],
        'body' => $this->request->data['body'],
      );
      // データを登録
      $id = $this->Task->save($data);
      if($id === false) {
        $this->render('create');
        return;
      }

      $msg = sprintf(
        'タスク %s を登録しました。',
        $this->Task->id
      );

       // メッセージを表示してリダイレクト
      $this->Session->setFlash($msg);
      $this->redirect('/Tasks/index');
      return;
    }
    $this->render('create');
  }

  public function edit() {
    // 指定されたタスクのデータを取得
    $id = $this->request->pass[0];
    $options = array(
      'conditions' => array(
        'Task.id' => $id,
        'Task.status' => 0
      )
    );

    $task = $this->Task->find('first', $options);

    // データが見つからない場合は一覧へ
    if ($task == false) {
      $this->Session->setFlash('タスクが見つかりません');
      $this->redirect('/Tasks/index');
    }

    // フォームから送信された場合に実行
    if ($this->request->is('post')) {
      $data = array(
        'id' => $id,
        'name' => $this->request->data['Task']['name'],
        'body' => $this->request->data['Task']['body']
      );
      if ($this->Task->save($data)) {
        $this->Session->setFlash('更新しました');
        $this->redirect('/Tasks/index');
      }
    } else {
      // postされていない場合は初期データをセット
      $this->request->data = $task;
    }
  }

  public function getlist() {
    $page = $this->paginate('Task', array(
      'Task.id not' => null
    ));
    $this->set('page', $page);
  }

}
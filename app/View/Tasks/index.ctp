<?php echo $this->Html->link('新規タスク', '/Tasks/create');?>
<h3><?php echo count($tasks_data);?>件のタスクが未完了です</h3>


<!-- <table>
  <tr>
    <th>ID</th>
    <th>名前</th> -->
    <!-- <th>詳細</th> -->
    <!-- <th>期限日</th>
    <th>作成日</th>
    <th>操作</th>
  </tr> -->

<?php foreach($page as $row):?>
  <?php echo $this->element('task',array('task' => $row))?>
<?php endforeach; ?>
</table>
<?php echo $this->Paginator->counter();?><br/>
<?php echo $this->Paginator->prev('前へ');?><br/>
<?php echo $this->Paginator->numbers();?><br/>
<?php echo $this->Paginator->next('次へ');?><br/>

<?php echo $this->Test->cake();?>
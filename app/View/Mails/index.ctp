<?php echo $this->Html->link('アドレス登録', '/Mails/create');?>
<?php 
  // debug($messages);
  $this->Form->create('Mail', array('type' => 'post'));
?>

<?php echo $this->Form->input('Mail.address', array('label' => 'アドレス'));?>
<?php echo $this->Form->end('送信');?>
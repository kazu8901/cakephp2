<?php echo $this->Form->create('Task', array('type' => 'post')); ?>

<?php echo $this->Form->input('Task.name', array('label' => 'タイトル'));?>
<?php echo $this->Form->input('Task.body', array('label' => '詳細'));?>
<?php echo $this->Form->end('保存');?>
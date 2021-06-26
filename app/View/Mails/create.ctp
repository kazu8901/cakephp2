<?php echo $this->Form->create('Mail', array('type' => 'file'));?>

<?php echo $this->Form->input('Mail.address', array('label' => 'アドレス'));?>
<?php echo $this->Form->input('Mail.subject', array('label' => '件名'));?>
<?php echo $this->Form->input('Mail.message', array('label' => '本文'));?>
<?php echo $this->Form->file('Mail.file', array('label' => 'ファイル'));?>

<?php echo $this->Form->end('送信');?>
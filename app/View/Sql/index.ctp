<h1>SQL Injection</h1>
<?php if (!empty($user)):?>
<p>Hello!</p>
<?php else: ?>
<?php echo $this->Form->create('User');?>
<?php echo $this->Form->input('email');?>
<?php echo $this->Form->input('pass');?>
<?php echo $this->Form->end('submit');?>
<?php endif; ?>
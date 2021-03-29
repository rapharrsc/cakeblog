<h1><?php echo h($post['Post']['title']); ?></h1>

<p><small>Created: <?php echo $post['Post']['created']; ?></small></p>

<p><?php echo h($post['Post']['body']); ?></p>


<?php 
if ($loggedIn) {
	# code...
	echo $this->Html->link('Editar', 'edit/'. $post['Post']['id']);
	echo $this->Html->tag('span','&nbsp');
	echo $this->Form->postLink('Deletar',array('action'=>'delete',$post['Post']['id']));
}
?>
<?php
$uid = $this->Session->read('Auth.User.id');
//echo $uid;
$uname = $this->Session->read('Auth.User.username');
//echo $uname;
$urole = $this->Session->read('Auth.User.role');
//echo $urole
?>

<h1>Bem-Vindo <?= $uname ?> Nível de acesso: <?= $urole ?></h1>

<table>
	<tr>
		<th>Id</th>
		<th>Username</th>
		<th>Role</th>
		<th>Actions</th>
	</tr>

	<?php foreach ($users as $user): ?>
		<tr>
			<td><?= $user['User']['id']; ?></td>
			<td><?= $user['User']['username']; ?></td>
			<td><?= $user['User']['role'] ?></td>
			<td>
				<?php 
					echo $this->Form->postLink('Delete', array('action'=>'delete', $user['User']['id']),array('confirm' => 'Certeza?'));

					echo $this->Html->tag('span','&nbsp');

					echo $this->Html->link('Edit', array('action'=>'edit',$user['User']['id']));
				?>
			</td>
		</tr>
	<?php endforeach; ?>
	<?php unset($user); ?>	

</table>
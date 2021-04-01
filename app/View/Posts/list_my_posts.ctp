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
        <th>Title</th>
        <th>Actions</th>
        <th>Created</th>
        <th>Modified</th>
    </tr>

    <?php foreach ($posts as $post): ?>

        <?php if ($uid === $post['Post']['user_id']) { ?>
            <tr>
           <td> <?= $post['Post']['id']; ?> </td>
           <td> <?= $this->Html->link($post['Post']['title'], array('controller' => 'posts', 'action' => 'view', $post['Post']['id'])); ?> </td>
           <td> <?php echo $this->Form->postLink('Delete',array('action' => 'delete', $post['Post']['id']),array('confirm' => 'Are you sure?'));
           echo $this->Html->tag('span','&nbsp');
           echo $this->Html->link('Edit',array('action' => 'edit', $post['Post']['id']));?> </td>
           <td> <?= $post['Post']['created']; ?> </td>
           <td> <?= $post['Post']['modified']; ?> </td>
       </tr>
       <?php } ?>

   <?php endforeach; ?>
   <?php unset($post); ?>


</table>
